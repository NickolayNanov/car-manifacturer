<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('manufacturers', \App\Http\Controllers\ManufacturersController::class);
    Route::resource('cars', \App\Http\Controllers\CarsController::class);
    Route::resource('models', \App\Http\Controllers\CarModelsController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

