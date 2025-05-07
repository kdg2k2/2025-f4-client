<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UpgradeController;
use App\Http\Controllers\Admin\VnpayController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/terms-of-service', 'getTerms');
    Route::get('/privacy-policy', 'getPrivacy');
    Route::get('/faq', 'getFAQ');
    Route::get('/document', 'getDocument');
    Route::get('/document/index', 'getDocumentDetail');
    Route::get('/maps', 'getMaps');
    Route::get('/maps/index', 'getMapsDetail');
});

Route::controller(AuthController::class)->group(function () {
    # login
    Route::get("login", "login")->name("login");
    # register
    Route::get("register", "register")->name("register");
    # verify account
    Route::get("verify", "verify")->name("verify");
    # forget password
    Route::get("forget-password", "forgetPassword")->name("forget-password");
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get("", [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix("documents")->controller(DocumentController::class)->group(function () {
        Route::get("/", "index")->name("document.index");
    });

    Route::get("/cart", [CartController::class, 'index'])->name("admin.cart.index");

    Route::prefix("upgrate")->controller(UpgradeController::class)->group(function () {
        Route::get("", "index")->name("upgrate.index");
    });

    Route::prefix("payment")->controller(VnpayController::class)->group(function () {
        Route::get("return", "return")->name("vnpay.return");
        Route::get("{orderCode}", "result")->name("vnpay.result");
    });
});

Route::prefix("vnpay")->controller(VnpayController::class)->group(function () {
    Route::get("ipn", "ipn")->name("vnpay.ipn");
});
