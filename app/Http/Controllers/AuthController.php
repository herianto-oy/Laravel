<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->session()->get("userData")) {
            return redirect("account");
        }

        return view("auth/login");
    }

    public function registration(Request $request)
    {
        if ($request->session()->get("userData")) {
            return redirect("account");
        }

        return view("auth/registration");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("auth");
    }
}
