<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/wardrobe', [WardrobeController::class, 'store']); // Create
    Route::get('/wardrobe', [WardrobeController::class, 'index']); // Read
    Route::get('/wardrobe/{id}', [WardrobeController::class, 'show']); // Single item
    Route::put('/wardrobe/{id}', [WardrobeController::class, 'update']); // Update
    Route::delete('/wardrobe/{id}', [WardrobeController::class, 'destroy']); // Delete
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Placeholder for authentication routes
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:sanctum');
