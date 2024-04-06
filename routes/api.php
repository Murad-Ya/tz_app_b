<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('Book')->group(function () {
    Route::get('/', [\App\Http\Controllers\BookController::class , 'index']);
    Route::post('/store' , [\App\Http\Controllers\BookController::class , 'store']);
    Route::get('show/{id}', [\App\Http\Controllers\BookController::class , 'show']);
    Route::delete('delete/{id}', [\App\Http\Controllers\BookController::class , 'destroy']);
});

Route::prefix('Save_image')->group(function () {
Route::post('/' , [\App\Http\Controllers\ImageController::class ,'store']);
});
