<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/allout', [UserController::class, 'allout']);
    Route::get('/destroy', [UserController::class, 'destroy']);
    Route::post('/upload', [PostController::class, 'upload']);
    Route::get('/download/{file_id}', [PostController::class, 'download']);
    Route::get('/show/{file_id}', [PostController::class, 'show']);
});
Route::post('/registration', [UserController::class, 'registration']);
Route::post('/authentication', [UserController::class, 'authentication']);