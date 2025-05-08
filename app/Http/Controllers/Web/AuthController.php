<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordCodeRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;
    public function __construct()
    {
        $this->authService = app(AuthService::class);
    }
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

    public function verify($token)
    {
        return view("pages.auth.verify", ['token' => $token]);
    }

    public function forgetPassword()
    {
        return view("pages.auth.forget-password");
    }

    public function forgetPasswordCode(ForgetPasswordCodeRequest $request)
    {
        $code = $request->validated()['code'];
        try {
            $this->authService->forgetPasswordCheckCode($code);
        } catch (Exception $e) {
            return redirect(route('forget-password'))->with('err', $e->getMessage());
        }
        return view("pages.auth.forget-password-code", ['code' => $code]);
    }
}
