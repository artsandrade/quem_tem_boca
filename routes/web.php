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
    return redirect()->route('login');
})->name('index');

Route::middleware('authenticated_web')->group(function () {
    Route::get('/login', function () {
        return view('Authentication.Login');
    })->name('login');
    
    Route::get('/criar-conta/restaurante', function () {
        return view('Authentication.RegisterRestaurant');
    })->name('register_restaurant');
    
    Route::get('/criar-conta/usuario', function () {
        return view('Authentication.RegisterUser');
    })->name('register_user');
});

Route::middleware('validate_token')->group(function () {
    Route::get('/restaurantes', function () {
        return view('Restaurants.Index');
    })->name('restaurants');

    Route::get('/restaurante/{id}', function () {
        return view('Restaurant.Index');
    })->name('restaurant');
});
