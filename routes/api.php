<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\DocumentFieldController;
use App\Http\Controllers\Api\DocumentTypeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UpgradeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("api")->group(function () {
    Route::prefix("auth")->controller(AuthController::class)->group(function () {
        # login
        Route::post("login", "login")->middleware("throttle:5,1")->name("auth.login");
        # register
        Route::post("register", "register")->name("auth.register");
        # refresh access token
        Route::post("refresh", "refresh")->middleware("throttle:5,1")->name("auth.refresh");
        # logout
        Route::post("logout", "logout")->middleware("auth:api")->name("auth.logout");
        # google
        Route::prefix("google")->group(function () {
            # redirect to Google's OAuth page
            Route::get('redirect', 'authGoogleRedirect')->name('auth.google.redirect');
            # handle the callback from Google
            Route::get('callback', 'authGoogleCallback')->name('auth.google.callback');
        });
    });

    Route::prefix("document")->group(function () {
        Route::get("/types", [DocumentTypeController::class, 'index']);
        Route::get("/fields", [DocumentFieldController::class, 'index']);
        Route::controller(DocumentController::class)->group(function () {
            Route::get("/", "index");
        });
    });
    Route::middleware("auth:api")->group(function () {
        Route::prefix("cart")->controller(CartController::class)->group(function () {
            Route::get("/", "index");
            Route::post("/", "add");
            Route::delete("/", "remove");
        });

        Route::prefix("upgrade")->controller(UpgradeController::class)->group(function () {
            Route::get("/", "index");
            Route::post("/payment", "payment");
        });

        Route::get("/checkout", [OrderController::class, 'checkout']);
        Route::get("/checkout/return", [OrderController::class, 'return'])->name('checkout.return');

        Route::prefix("order")->controller(OrderController::class)->group(function () {
            Route::get("/{orderCode}", "show");
            Route::get("/{orderCode}/status/payment", "paymentStatus");
        });
    });

});
