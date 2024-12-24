<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User route (if needed)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/clients', [ClientController::class, 'index']);             
// Route::post('/clients', [ClientController::class, 'store']);       
// Route::get('/clients/{client}', [ClientController::class, 'show']);        
// Route::put('/clients/{client}', [ClientController::class, 'update']);    
// Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
