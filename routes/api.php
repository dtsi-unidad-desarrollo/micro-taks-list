<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserProfileController;

Route::middleware('auth.jwt')->put('/profile', [UserProfileController::class, 'updateProfile']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});




