<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\Car;


Route::get('/', function () {
    return view('agent.register');
})->name('register');
Route::prefix('agent')->group(function () {
    Route::controller(AgentController::class)->group(function () {
        Route::post('register', 'agentRegister')->name('agent.register');
        Route::get('login', 'login')->name('login');
        Route::post('dologin', 'dologin')->name('agent.dologin');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('brand')->group(function () {
        Route::controller(BrandController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create.brand');
            Route::get('show', 'show')->name('show.brand');
            Route::get('edit/{id}', 'edit')->name('edit.brand');
            Route::post('update', 'update')->name('update.brand');
            Route::get('delete/{id}', 'destroy')->name('brand.delete');
        });
    });

    Route::prefix('car')->group(function () {
        Route::controller(CarController::class)->group(function () {
            Route::get('create', 'create')->name('car.create');
            Route::post('store', 'store')->name('car.store');
            Route::get('show', 'show')->name('show.cars');
            Route::get('edit/{id}', 'edit')->name('car.edit');
            Route::post('updated', 'update')->name('car.update');
            Route::get('delete/{id}', 'destroy')->name('car.delete');
        });
    });

    Route::prefix('customer')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::get('create', 'create')->name('customer.create');
            Route::post('store', 'store')->name('customer.store');
            Route::get('show', 'show')->name('show.customers');
            Route::get('edit/{id}', 'edit')->name('customer.edit');
            Route::post('update', 'update')->name('update.customer');
            Route::get('delete/{id}', 'destroy')->name('customer.delete');
        });
    });

    Route::prefix('order')->group(function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('create', 'create')->name('create.order');
            Route::post('store', 'store')->name('store.order');
            Route::get('show', 'show')->name('show.orders');
        });
    });
});
