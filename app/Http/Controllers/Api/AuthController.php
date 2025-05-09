<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordChagnePassRequest;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RefreshRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use App\Traits\CheckLocalTraits;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use CheckLocalTraits;
    protected $authService;
    public function __construct()
    {
        $this->authService = app(AuthService::class);
    }

    public function login(LoginRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            return $this->setCookie($this->authService->login($request->validated()));
        });
    }

    public function refresh(Request $request)
    {
        $refresh_token = $request->cookie('refresh_token');
        return $this->catchAPI(function () use ($refresh_token) {
            $res = $this->authService->refreshToken([
                'refresh_token' => $refresh_token,
            ]);
            return $this->setCookie($res);
        });
    }

    protected function setCookie($data)
    {
        $isLocal = $this->isLocal();
        return response()->json($data, 200)
            ->cookie('access_token', $data['access_token'], $data['access_token_expires_in'], '/', null, !$isLocal, true, false, 'Strict')
            ->cookie('refresh_token', $data['refresh_token'], $data['refresh_token_expires_in'], '/', null, !$isLocal, true, false, 'Strict');
    }

    public function logout(Request $req)
    {
        return $this->catchAPI(function () use ($req) {
            $this->authService->logout();
            return response()->json([
                'message' => 'User successfully signed out'
            ], 200)
                ->cookie('access_token')
                ->cookie('refresh_token');
        });
    }

    public function authGoogleRedirect()
    {
        $url = (new AuthService())->authGoogleRedirect();
        return redirect()->away($url);
    }

    public function authGoogleCallback(Request $request)
    {
        try {
            $data = (new AuthService())->authGoogleCallback();

            // nếu client gửi Accept: application/json
            if ($request->expectsJson())
                return response()->json($data, 200);

            $isLocal = $this->isLocal();
            return response()->view('pages.auth.google_callback', [
                'access_token' => $data['access_token'],
                'user' => $data['user'],
            ])->cookie('access_token', $data['access_token'], $data['access_token_expires_in'], '/', null, !$isLocal, true, false, 'Strict')
                ->cookie('refresh_token', $data['refresh_token'], $data['refresh_token_expires_in'], '/', null, !$isLocal, true, false, 'Strict');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors($e->getMessage());
        }
    }

    public function register(RegisterRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $this->authService->register($request->validated());
            return response()->json([
                'message' => 'Đăng ký thành công! Vui lòng kiểm tra email để xác thực tài khoản',
            ], 200);
        });
    }

    public function verify(Request $request)
    {
        return $this->catchAPI(function () use ($request) {
            $this->authService->verify($request->token);
            return response()->json([
                'message' => 'Xác thực tài khoản thành công',
            ], 200);
        });
    }

    public function resendVerify(Request $request)
    {
        return $this->catchAPI(function () use ($request) {
            if (empty($request->email))
                return response()->json([
                    'message' => 'Email không được để trống',
                ], 422);
            $this->authService->resendVerify($request->email);
            return response()->json([
                'message' => 'Gửi mã xác thực thành công',
            ], 200);
        });
    }

    public function profile(Request $request)
    {
        return $this->catchAPI(function () use ($request) {
            return response()->json([
                'data' => auth('api')->user(),
            ], 200);
        });
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $this->authService->forgetPassword($request->validated());
            return response()->json([
                'message' => 'Kiểm tra email để đổi lại mật khẩu',
            ], 200);
        });
    }

    public function forgetPasswordChangePass(ForgetPasswordChagnePassRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $this->authService->forgetPasswordChangePass($request->validated());
            return response()->json([
                'message' => 'Đổi mật khẩu thành công',
            ], 200);
        });
    }
}
