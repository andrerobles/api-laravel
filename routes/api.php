<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/login', [AuthController::class, 'login']);
Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working',
        'status' => 'success',
        'timestamp' => now()->toDateTimeString()
    ]);
});

// Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('products', App\Http\Controllers\API\ProductController::class);
});