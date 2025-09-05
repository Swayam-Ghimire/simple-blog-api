<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->controller(PostController::class)->group(function() {
    Route::get('/posts', 'index');
    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/posts', 'store');
        Route::get('/posts/{post}', 'show');
        Route::put('/posts/{post}/edit', 'update');
        Route::delete('/posts/{post}/delete', 'destroy');
    });
});

Route::prefix('v1')->controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});