<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\AgentLoginController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('store',([OrderController::class, 'store']));
Route::post('login', ([AgentLoginController::class, 'login']));
