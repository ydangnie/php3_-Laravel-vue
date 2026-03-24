<?php

use App\Http\Controllers\DanhMuc;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use App\Models\ThuongHieu;
use Illuminate\Support\Facades\Route;

Route::resource('/', ViewController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('products', ProductController::class);
Route::Get('products', [ProductController::class, 'index'])
->name('products.index');
Route::Get('products/create', [ProductController::class, 'create'])
->name('products.create');
Route::post('products/store', [ProductController::class, 'store'])
->name('store');
Route::Get('products/edit/{id}/', [ProductController::class, 'edit'])
->name('products.edit');

Route::resource('danhmuc', DanhMuc::class);
Route::resource('thuonghieu', ThuongHieu::class);
require __DIR__.'/auth.php';
