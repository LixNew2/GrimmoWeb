<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\CAuth::class, 'show_login'])->name('login');
Route::get('/signup', [\App\Http\Controllers\CAuth::class, 'show_signup']);
Route::get('/my_owns', [\App\Http\Controllers\Owns::class, 'show_my_owns'])->middleware('auth:sanctum');
Route::get('/favorites', [\App\Http\Controllers\Owns::class, 'show_favorite'])->middleware('auth:sanctum');
Route::get('/own/{id}', [\App\Http\Controllers\Owns::class, 'show_good_spec']);
Route::get('/my_own/{id}', [\App\Http\Controllers\Owns::class, 'show_good_spec'])->middleware('auth:sanctum');

Route::post('/login', [\App\Http\Controllers\CAuth::class, 'login']);
Route::post('/signup', [\App\Http\Controllers\CAuth::class, 'signup']);
Route::post('/logout', [\App\Http\Controllers\CAuth::class, 'logout'])->name('logout');
Route::post('/search', [\App\Http\Controllers\Owns::class, 'get_goods_search'])->name('search');
Route::post('/add_favorite', [\App\Http\Controllers\Owns::class, 'add_favorite_good'])->name('add_favorite')->middleware('auth:sanctum');
Route::post('/remove_favorite', [\App\Http\Controllers\Owns::class, 'remove_favorite_good'])->name('remove_favorite')->middleware('auth:sanctum');
