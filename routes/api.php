<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewssController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('news/all', [NewssController::class, 'index']);
Route::get('news/{id}', [NewssController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('news', [NewssController::class, 'store']);
    Route::put('news/{id}', [NewssController::class, 'update']);
    Route::delete('news/{id}',[NewssController::class, 'destroy']);
    

});

