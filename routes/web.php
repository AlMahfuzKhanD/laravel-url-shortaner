<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;

// Home Routes
Route::get('/',[HomeController::class,'index']);


// Auth routes
Route::get('/login',[LoginUserController::class,'index'])->name('login');
Route::get('/register',[RegisterUserController::class,'index'])->name('register');