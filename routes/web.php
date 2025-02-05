<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;

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

        // Rutas de Categorías (requieren autenticación)
        Route::get('/categories', [CategoryController::class, 'index'])->name('merchant.categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('merchant.categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('merchant.categories.store');

        // Rutas de Productos (requieren autenticación)
        Route::get('/products', [ProductController::class, 'index'])->name('merchant.products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('merchant.products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('merchant.products.store');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/merchants', [AdminController::class, 'index'])->name('admin.merchants.index');
    });
});

Route::get('/shop/{shop}', [StoreController::class, 'show'])->name('shop.show');


