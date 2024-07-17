<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\TaskController;
use Auth0\Login\Auth0Controller;
use App\Http\Controllers\Auth\LoginController;

// Rutas de autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Rutas de autenticación
Route::get('auth/google', [LoginController::class, 'redirectToProvider']);
Route::get('auth/google/callback', [LoginController::class, 'handleProviderCallback']);

// Rutas protegidas por JWT
Route::middleware('auth:api')->group(function () {
    Route::put('/profile', [UserProfileController::class, 'updateProfile']);
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    // Rutas para usuarios autenticados
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
});

Route::get('/auth/callback', [Auth0Controller::class, 'callback'])->name('auth.callback');
Route::get('/auth/logout', [Auth0Controller::class, 'logout'])->name('auth.logout');

// Rutas protegidas por JWT y con rol de admin
Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});






