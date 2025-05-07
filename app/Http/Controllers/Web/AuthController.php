<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (auth('api')->user())
            return redirect(route('admin.dashboard'));
        return view("pages.auth.login");
    }

    public function register()
    {
        if (auth('api')->user())
            return redirect(route('admin.dashboard'));
        return view("pages.auth.register");
    }

    public function verify()
    {
        return view("admin.auth.verify");
    }

    public function forgetPassword()
    {
        return view("admin.auth.forget-password");
    }
}
