<?php


use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//ADMIN ROUTY -> TREBA PREROBIT DO RESOURCE ROUTY S MIDDLEWAROM
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::delete('/products{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');


});



//routa na registraciu
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

//routa na prihlasenie
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'autenthificate']);

//routa na logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
ADMIN ROUTY ZALOHA
Route::post('admin/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');

Route::delete('admin/products{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.product')->middleware('auth');

Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category')->middleware('auth');

Route::post('admin/category', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users')->middleware('auth');
*/

