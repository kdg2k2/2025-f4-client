<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Upgrade\PaymentRequest;
use App\Services\UpgradeService;
use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    protected $upgradeService;
    public function __construct()
    {
        $this->upgradeService = app(UpgradeService::class);
    }
    public function index(Request $request)
    {
        return $this->catchAPI(function () use ($request) {
            $res = $this->upgradeService->list($request->all());
            return response()->json([
                'data' => $res
            ], 200);
        });
    }

    public function payment(PaymentRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $idUser = auth()->user()->id;
            $res = $this->upgradeService->payment($idUser, $request->all());
            return [
                'data' => $res
            ];
        });
    }
}
