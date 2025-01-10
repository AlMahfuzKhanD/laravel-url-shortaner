<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/create_short_url',[UrlController::class,'createShortUrl'])->name('url.short');
Route::get('/{short_url}',[UrlController::class,'redirectToOriginalUrl'])->name('url.redirect');
Route::get('stats/{short_url}',[UrlController::class,'stats'])->name('url.stats');

