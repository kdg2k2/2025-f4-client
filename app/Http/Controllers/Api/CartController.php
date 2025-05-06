<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddRequest;
use App\Http\Requests\Cart\CartRequest;
use App\Http\Requests\Cart\RemoveRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct()
    {
        $this->cartService = app(CartService::class);
    }
    public function index(CartRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $idUser = auth('api')->user()->id;
            $res = $this->cartService->cart($idUser, $request->validated());
            return response()->json([
                'data' => $res['cartItems']
            ], 200);
        });
    }

    public function add(AddRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $idCart = auth('api')->user()->cart->id;
            $res = $this->cartService->addCart($idCart, $request->validated());
            return response()->json([
                'data' => $res,
                'message' => 'Thêm sản phẩm vào giỏ hàng thành công'
            ], 200);
        });
    }

    public function remove(RemoveRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $idCart = auth('api')->user()->cart->id;
            $res = $this->cartService->removeCart($idCart, $request->all());
            return response()->json([
                'data' => $res,
                'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
            ], 200);
        });
    }

    // public function clear(Request $request)
    // {
    //     return response()->json([
    //         'message' => 'Cart clear',
    //     ]);
    // }
}
