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
    return view('Authentication.Login');
})->name('login');

Route::middleware('validate_token')->group(function () {
    Route::get('/index', function () {
        return view('Dashboard.Index');
    })->name('index');

    Route::get('/restaurante/{id}', function () {
        return view('Restaurant.Index');
    })->name('restaurant');
});

Route::get('/criar-conta/restaurante', function () {
    return view('Authentication.RegisterRestaurant');
})->name('register_restaurant');

Route::get('/criar-conta/usuario', function () {
    return view('Authentication.RegisterUser');
})->name('register_user');
