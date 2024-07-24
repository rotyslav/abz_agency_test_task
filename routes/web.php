<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('auth')->controller(EmployeeController::class)->prefix('employees')->as('employee.')->group(function (
) {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/destroy', 'destroy')->name('destroy');
});


Route::middleware('auth')->controller(PositionController::class)->prefix('positions')->as('position.')->group(function (
) {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/destroy', 'destroy')->name('destroy');
});

Auth::routes();

