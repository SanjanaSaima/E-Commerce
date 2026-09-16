<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('product/view/{id}', [ProductController::class, 'view'])->name('products.view');

Route::get('user/register', [AuthController::class, 'register'])->name('user.register');
Route::post('user/registerStore', [AuthController::class, 'registerStore'])->name('user.registerStore');
Route::get('user/login', [AuthController::class, 'login'])->name('user.login');
Route::post('user/loginStore', [AuthController::class, 'loginStore'])->name('user.loginStore');

Route::get('/admin/index', [ProductController::class, 'adminIndex'])->name('admin.index');

Route::get('/product/create', function () {
    return view('admin.create');
})->name('admin.create');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');