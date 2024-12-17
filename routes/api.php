<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('add_user', [\App\Http\Controllers\CAPI::class, 'add_user'])->middleware('auth:sanctum');
Route::post('add_good', [\App\Http\Controllers\CAPI::class, 'add_good'])->middleware('auth:sanctum');

Route::post('delete_user', [\App\Http\Controllers\CAPI::class, 'delete_user'])->middleware('auth:sanctum');
Route::post('delete_good', [\App\Http\Controllers\CAPI::class, 'delete_good'])->middleware('auth:sanctum');

Route::post('edit', [\App\Http\Controllers\CAPI::class, 'edit'])->middleware('auth:sanctum');

Route::post('get_good_stats', [\App\Http\Controllers\CAPI::class, 'get_good_stats'])->middleware('auth:sanctum');


