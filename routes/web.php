<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MerchantController;


Route::get('/', function () {
    return view('merchant/register');
});


Route::prefix('merchant')->group(function () {
    Route::get('/register', [MerchantController::class, 'showRegisterForm'])->name('merchant.register');
    Route::post('/register', [MerchantController::class, 'register']);

    Route::get('/login', [MerchantController::class, 'showLoginForm'])->name('merchant.login');
    Route::post('/login', [MerchantController::class, 'login']);

    Route::middleware('auth:merchant')->group(function () {
        Route::get('/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
        Route::get('/store-list', [MerchantController::class, 'storeList'])->name('merchant.store.list');
        Route::get('/create-store', [MerchantController::class, 'showCreateStore'])->name('merchant.store.create');
        Route::post('/create-store', [MerchantController::class, 'createStore']);
    });
});

