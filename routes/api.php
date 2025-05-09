<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\DocumentFieldController;
use App\Http\Controllers\Api\DocumentTypeController;
use App\Http\Controllers\Api\DownloadController;
use App\Http\Controllers\Api\LayoutController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\StatisticalController;
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
        #verify account
        Route::post("verify/{token}", "verify")->name("auth.verify");
        # resend verify code
        Route::post("resend-verify", "resendVerify")->name("auth.resend-verify");
        # refresh access token
        Route::post("refresh", "refresh")->middleware("throttle:5,1")->name("auth.refresh");
        # logout
        Route::post("logout", "logout")->middleware("auth:api")->name("auth.logout");
        # forget password
        Route::post("forget-password", "forgetPassword")->name("api.forget-password");
        Route::post("forget-password/change-pass", "forgetPasswordChangePass")->name("api.forget-password.change-pass");
        # google
        Route::prefix("google")->group(function () {
            # redirect to Google's OAuth page
            Route::get('redirect', 'authGoogleRedirect')->name('auth.google.redirect');
            # handle the callback from Google
            Route::get('callback', 'authGoogleCallback')->name('auth.google.callback');
        });
    });
    Route::prefix('/')->middleware("auth:api")->group(function () {
        Route::prefix("document")->group(function () {
            Route::get("/types", [DocumentTypeController::class, 'index']);
            Route::get("/fields", [DocumentFieldController::class, 'index']);
            Route::controller(DocumentController::class)->group(function () {
                Route::get("/", "index");
                Route::get("/{id}", "show");
            });
        });
        Route::prefix("cart")->controller(CartController::class)->group(function () {
            Route::get("/", "index");
            Route::post("/", "add");
            Route::delete("/", "remove");
        });

        Route::prefix("upgrade")->controller(UpgradeController::class)->group(function () {
            Route::get("/", "index");
            Route::post("/payment", "payment");
        });

        Route::post("checkout", [CheckoutController::class, "checkout"]);

        Route::prefix("order")->controller(OrderController::class)->group(function () {
            Route::get("/list", "index");
            Route::get("/{orderCode}", "show");
            Route::get("/{orderCode}/status/payment", "paymentStatus");
        });

        Route::prefix("download")->controller(DownloadController::class)->group(function () {
            Route::get('temp/{token}', 'tempDownload')->name('tempDownload');
            Route::get("{code}/{orderCode}", "downloadDocument");
        });

        Route::get('profile', [AuthController::class, 'profile']);

        Route::prefix("statistical")->controller(StatisticalController::class)->group(function () {
            Route::get('', 'index');
        });
    });
    Route::get('categories', [LayoutController::class, 'categories']);
});
