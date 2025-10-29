<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// lamps
Route::get('/lamps', [App\Http\Controllers\api\LampController::class, 'index']);

// update lamp
Route::post('/lamps/{id}', [App\Http\Controllers\api\LampController::class, 'updateLamp']);
