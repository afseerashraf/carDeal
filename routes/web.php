<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\Car;


Route::view('/', 'agent.register');
Route::prefix('agent')->group(function () {
    Route::controller(AgentController::class)->group(function () {
        Route::post('register', 'agentRegister')->name('agent.register');
        Route::view('login', 'agent.login')->name('login');
        Route::post('dologin', 'dologin')->name('agent.dologin');
        Route::get('logout', 'logout')->name('agent.logout');
        Route::get('forgot-password', 'showForgetPasswordEmailForm')->name('forgotPasswordEmail');
        Route::post('forget-password','submitForgetPasswordEmail')->name('forget.password.post');
        Route::get('reset/{token}', 'viewresetPasswordForm')->name('viewresetPasswordForm');
        Route::post('doreset', 'doreset')->name('doreset');



});
});

Route::middleware('auth:agent')->group(function(){
    Route::prefix('brand')->group(function () {
        Route::controller(BrandController::class)->group(function () {
            Route::view('index', 'brand.create')->name('index');
            Route::post('create', 'create')->name('create.brand');
            Route::get('show', 'show')->name('show.brand');
            Route::get('edit/{id}', 'edit')->name('edit.brand');
            Route::post('update', 'update')->name('update.brand');
            Route::get('delete/{id}', 'destroy')->name('brand.delete');
            Route::get('restore/{id}', 'restore')->name('brand.restore');
        });
    });

});
    Route::prefix('car')->group(function () {
        Route::controller(CarController::class)->group(function () {
            Route::view('create', 'car.create')->name('car.create');
            Route::post('store', 'store')->name('car.store');
            Route::get('show', 'show')->name('show.cars');
            Route::get('edit/{id}', 'edit')->name('car.edit');
            Route::post('updated', 'update')->name('car.update');
            Route::get('delete/{id}', 'destroy')->name('car.delete');
            Route::get('restore/{id}', 'restore')->name('car.restore');
            Route::get('forcedelete/{id}', 'forceDelete')->name('car.forceDelete');
        });
    });
    Route::prefix('customer')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::view('create', 'customer.create')->name('customer.create');
            Route::post('store', 'store')->name('customer.store');
            Route::get('show', 'show')->name('show.customers');
            Route::get('edit/{id}', 'edit')->name('customer.edit');
            Route::post('update', 'update')->name('update.customer');
            Route::get('delete/{id}', 'destroy')->name('customer.delete');
            Route::get('restore/{id}', 'restore')->name('customer.restore');
            Route::get('forcedelete/{id}', 'forcedelete')->name('customer.forcedelete');
            Route::get('order/{id}', 'order')->name('customer.order');
            Route::get('UK-server', 'ukserver')->name('broadcast');
            Route::get('language', 'switch')->name('language');
        });
    });

    Route::prefix('order')->group(function () {
        Route::controller(OrderController::class)->group(function () {
            Route::view('create', 'order.create')->name('create.order');
            Route::post('store', 'store')->name('store.order');
            Route::get('show', 'show')->name('show.orders');

        });
    });
