<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [RegisterController::class, 'create'])->name('register');
Route::post('/store', [RegisterController::class , 'store'])->name('store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home.admin');
});

Route::middleware('role:customer')->prefix('customer')->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home.customer');
});

Route::middleware('role:vendor')->prefix('vendor')->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home.vendor');
});
