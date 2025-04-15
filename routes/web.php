<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store'])->name('store');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('loginPost');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
