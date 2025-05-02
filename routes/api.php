<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/allout', [UserController::class, 'allout']);
    Route::get('/destroy', [UserController::class, 'destroy']);
});
Route::post('/registration', [UserController::class, 'registration']);
Route::post('/authentication', [UserController::class, 'authentication']);