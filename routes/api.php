<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::get('products',[ProductController::class, 'index']);
    Route::get('products/{id}',[ProductController::class, 'show']);
    
    
});