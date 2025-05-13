<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/brand/{brand}', [BrandController::class, 'show'])->name('brands.show');

Route::get('/post', [PostController::class, 'index'])->name('posts.index')->middleware('checkadmin');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('checkadmin');
Route::get('/post/create', [PostController::class, 'create'])->name('posts.create')->middleware('checkadmin');
Route::post('/post', [PostController::class, 'store'])->name('posts.store')->middleware('checkadmin');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('checkadmin');
Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('checkadmin');
Route::delete('/post/{post}/delete', [PostController::class, 'destroy'])->name('posts.delete')->middleware('checkadmin');

Route::get('/mail',[\App\Http\Controllers\MailController::class,'index'])->name('mail.index');
Route::post('/mail_forget',[\App\Http\Controllers\MailController::class,'forgetPassword'])->name('mail.forgetPassword');



