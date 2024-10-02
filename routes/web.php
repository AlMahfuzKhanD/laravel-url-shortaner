<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\RegisterUserController;

// Home Routes
Route::get('/',[HomeController::class,'index']);


// Auth routes
Route::get('/login',[LoginUserController::class,'index'])->name('login');
Route::post('/login',[LoginUserController::class,'login'])->name('auth.login');
Route::post('/logout',[LoginUserController::class,'logout'])->name('logout');
Route::get('/register',[RegisterUserController::class,'index'])->name('register');
Route::post('/register',[RegisterUserController::class,'store'])->name('store.register');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);    
});