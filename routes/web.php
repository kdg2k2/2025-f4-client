<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
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
    Route::get('register', 'getRegister')->name("register");
    Route::get('login', 'getLogin')->name("login");
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

    // Route::prefix('checkout')->controller(CheckoutController::class)->group(function () {
    //     Route::get('vnpay-return', 'vnpayReturn')->name('admin.checkout.vnpay-return');
    //     Route::get('{orderCode}', 'order')->name('admin.checkout.order');
    // });

    // Route::get("/cart", [CartController::class, 'index'])->name("admin.cart.index");

    // Route::prefix('role')->controller(UserRoleController::class)->group(function () {
    //     Route::get('upgrade', 'upgrade')->name('admin.role.upgrade');
    //     Route::get('payment', 'payment')->name('admin.role.payment');
    //     Route::get("vnpay-return", "vnpayReturn")->name("admin.role.vnpay-return");
    // });

    // Route::prefix('orders')->controller(OrderController::class)->group(function () {
    //     Route::get('', 'list')->name('admin.orders.list');
    // });
});
