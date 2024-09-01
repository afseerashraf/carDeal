<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('agent.register');
});
    Route::prefix('agent')->group(function(){
        Route::controller(AgentController::class)->group(function(){
            Route::post('register', 'agentRegister')->name('agent.register');
            Route::get('login', 'login')->name('login');
            Route::post('dologin', 'dologin')->name('agent.dologin');
    });
});
