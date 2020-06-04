<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function (Request $request) {
    if ($request->session()->get("userData")) {
        return redirect("account");
    } else {
        return redirect("auth");
    }
});

Route::get("/auth", "AuthController@login");
Route::post("/auth", "AccountsController@login");

Route::get("/auth/registration", "AuthController@registration");
Route::post("/auth/registration", "AccountsController@create");

Route::get("/auth/logout", "AuthController@logout");

Route::get("/account", "AccountsController@index");

Route::get("/account/changepassword", "AccountsController@changePassword");
Route::post("/account/changepassword", "AccountsController@updatePassword");

Route::get("/account/edit", "AccountsController@edit");
Route::post("/account/edit", "AccountsController@update");
