<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountsController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->session()->get("userData")) {
            return redirect("auth");
        }

        $email = $request->session()->get("userData");
        $account = DB::table('accounts')->where('email', $email)->get();
        return view("account/index", compact("account"));
    }

    public function changePassword(Request $request)
    {
        if (!$request->session()->get("userData")) {
            return redirect("auth");
        }

        $email = $request->session()->get("userData");
        $account = DB::table('accounts')->where('email', $email)->get();
        return view("account/changepassword", compact("account"));
    }

    public function edit(Request $request)
    {
        if (!$request->session()->get("userData")) {
            return redirect("auth");
        }

        $email = $request->session()->get("userData");
        $account = DB::table('accounts')->where('email', $email)->get();
        return view("account/edit", compact("account"));
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', "email"],
        ]);

        try {
            $account = new Account;
            $account->name = $request->name;
            $account->email = $request->email;
            $account->image = "default.jpg";
            $account->password = Hash::make($request->password1);
            $account->save();
            return redirect("/auth")->with('notif', 'Congratulation! your account has been created. Please login!');
        } catch (QueryException $e) {
            return redirect("/auth/registration")->with('notif', 'Failed!. Your email has been 
            registered. Please try agian!');
        }
    }

    public function login(Request $request)
    {
        if ($request->session()->get("userData")) {
            return redirect("account");
        }

        $account = DB::table('accounts')->where('email', $request->email)->get();

        if ($account->isEmpty()) {
            return redirect("auth")->with("notiff", " Email or Password is wrong!");
        } else {
            if (Hash::check($request->password, $account[0]->password)) {
                $request->session()->put("userData", $account[0]->email);
                return redirect("account");
            } else {
                return redirect("auth")->with("notiff", " Email or Password is wrong!");
            }
        }
    }



    public function update(Request $request)
    {
        if (!$request->session()->get("userData")) {
            return redirect("auth");
        }

        $email = $request->session()->get("userData");
        $account = DB::table('accounts')->where('email', $email)->get();

        $data = Account::find($account[0]->id);
        $data->name = $request->name;

        $image = $request->file("image");
        if ($image) {

            if ($account[0]->image !== "default.jpg") {
                Storage::delete($account[0]->image);
            }

            $profile = $image->store("");
            $data->image = $profile;
        }

        $data->save();
        return redirect("account")->with('notif', 'Your accout has been updated!');
    }

    public function updatePassword(Request $request)
    {

        if (!$request->session()->get("userData")) {
            return redirect("auth");
        }

        $email = $request->session()->get("userData");
        $account = DB::table('accounts')->where('email', $email)->get();

        if ($account[0]->password === $request->currentPassword) {
            $data = Account::find($account[0]->id);
            $data->password = $request->password1;
            $data->save();
        }


        return redirect("account");
    }
}
