<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\AgentLoginController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('register', ([AgentLoginController::class, 'register']));

Route::post('login', ([AgentLoginController::class, 'login']));
Route::middleware('auth:sanctum')->group(function(){
   
    Route::post('store',([OrderController::class, 'store']));
});

