<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/me', [AuthController::class, 'me']);
    
    Route::post('/data', function (Request $request) {
        return response()->json([
            'message' => 'Data received',
            'data' => $request->all(),
            'user' => $request->user()
        ]);
    });
});