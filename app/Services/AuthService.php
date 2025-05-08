<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

class AuthService extends BaseService
{
    protected $userService;
    protected $cartService;
    protected $puService;
    protected $pService;
    protected $customValidateService;
    public function __construct()
    {
        $this->userService = app(UserService::class);
        $this->customValidateService = app(CustomValidateRequestService::class);
        $this->cartService = app(CartService::class);
        $this->puService = app(PackageUserService::class);
        $this->pService = app(PackageService::class);
    }

    public function login(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            if (!$token = auth('api')->attempt($request))
                throw new Exception('Unauthorized', 401);

            return $this->createNewToken($token, $this->createRefreshToken());
        });
    }

    public function refreshToken(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            $refreshToken = request()->cookie('refresh_token');
            if (!$refreshToken)
                throw new Exception('Missing refresh token', 401);

            $token = new Token($refreshToken);
            $payload = JWTAuth::manager()->decode($token);

            if (!isset($payload['refresh']) || $payload['refresh'] !== true)
                throw new Exception('Invalid refresh token', 401);

            $userId = $payload['sub'];
            $user = $this->userService->findById($userId);

            if (!$user)
                throw new Exception('User not found', 404);

            return $this->createTokenWithUserRecord($user);
        });
    }

    public function logout()
    {
        return $this->tryThrow(function () {
            auth('api')->logout();
        });
    }

    protected function createRefreshToken()
    {
        $customClaims = [
            'refresh' => true,
            'exp' => Carbon::now()->addWeeks(2)->timestamp,
        ];

        $refreshToken = JWTAuth::customClaims($customClaims)->fromUser(auth('api')->user());
        return $refreshToken;
    }

    protected function createNewToken($token, $refreshToken)
    {
        $user = auth('api')->user();
        $user['path'] = $this->getAssetImage($user['path']);

        $refreshPayload = JWTAuth::setToken($refreshToken)->getPayload();

        return [
            'token_type' => 'bearer',
            'access_token' => $token,
            'access_token_expires_in' => 3600,
            'refresh_token' => $refreshToken,
            'refresh_token_expires_in' => max($refreshPayload['exp'] - Carbon::now()->timestamp, 0),
            'user' => $user,
        ];
    }

    protected function createTokenWithUserRecord($user)
    {
        $token = auth('api')->login($user);
        return $this->createNewToken($token, $this->createRefreshToken());
    }

    public function authGoogleRedirect()
    {
        return 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URL'),
            'response_type' => 'code',
            'scope' => 'email profile',
            'state' => Str::random(40),
        ]);
    }

    public function authGoogleCallback(): array
    {
        $client = new Client();
        $response = $client->post('https://oauth2.googleapis.com/token', [
            'form_params' => [
                'code' => request('code'),
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'redirect_uri' => env('GOOGLE_REDIRECT_URL'),
                'grant_type' => 'authorization_code',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $googleUser = $client->get('https://www.googleapis.com/oauth2/v3/userinfo', [
            'headers' => ['Authorization' => 'Bearer ' . $data['access_token']]
        ]);
        $googleUser = json_decode($googleUser->getBody()->getContents(), true);
        $existingUser = $this->userService->findByEmail($googleUser['email']);
        if (empty($existingUser)) {
            $userInfo = [
                'name' => $googleUser['name'],
                'email' => $googleUser['email'],
                'password' => (string) (time() + rand(0, 1000)),
            ];
            $existingUser = $this->newUserGoogle($userInfo);
            $existingUser = $this->userService->findById($existingUser['id']);
        }
        if (!$existingUser['cart'])
            $this->cartService->createCart($existingUser['id']);
        if (count($existingUser['packages']) === 0) {
            $p = $this->pService->getById(1);
            $this->puService->create([
                'user_id' => $existingUser['id'],
                'downloads_remaining' => $p['download_document_limit'],
                'package_id' => $p['id'],
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime('+' . $p['duration_days'] . ' days')),
            ]);
        }

        return $this->createTokenWithUserRecord($existingUser);
    }

    protected function newUserGoogle(array $userInfo)
    {
        $validated = $this->customValidateService->validate(
            $userInfo,
            new \App\Http\Requests\User\StoreRequest
        );

        return $this->userService->store($validated);
    }

    public function register(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            if (isset($request['password_confirmation']))
                unset($request['password_confirmation']);
            if (!isset($request['path']))
                $request['path'] = null;
            $user = $this->userService->store($request);
            $this->cartService->createCart($user['id']);
            $p = $this->pService->getById(1);
            $this->puService->create([
                'user_id' => $user['id'],
                'downloads_remaining' => $p['download_document_limit'],
                'package_id' => $p['id'],
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays($p['duration_days']),
            ]);
            return $user;
        });
    }
}
