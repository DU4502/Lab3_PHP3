<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinController;

/*
|--------------------------------------------------------------------------
| Web Routes - Lab 3 Laravel Blade Template
|--------------------------------------------------------------------------
*/

// Route trang chủ - hiển thị danh sách tin
Route::get('/', [TinController::class, 'index'])->name('home');

// Route chi tiết tin - hiển thị nội dung đầy đủ của 1 tin
Route::get('/tin/{id}', [TinController::class, 'chitiet'])->name('tin.chitiet');

// Route tin trong loại - hiển thị danh sách tin theo loại
Route::get('/cat/{idLT}', [TinController::class, 'tintrongloai'])->name('tin.loai');
