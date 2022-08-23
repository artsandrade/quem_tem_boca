<?php

use App\Domains\Restaurant\Controllers\RestaurantBusinessHourController;
use App\Domains\Restaurant\Controllers\RestaurantController;
use App\Domains\Restaurant\Controllers\RestaurantPhoneController;
use Illuminate\Support\Facades\Route;

Route::group([
  'prefix' => 'api/v1'
], function () {
  Route::post('restaurant', [RestaurantController::class, 'create']);

  Route::middleware('jwt')->group(function () {
    Route::get('restaurants', [RestaurantController::class, 'getAll']);
    Route::get('restaurants-by-category', [RestaurantController::class, 'getAllByCategory']);
    Route::get('restaurants-by-name', [RestaurantController::class, 'getAllByName']);
    Route::get('restaurant/{id}', [RestaurantController::class, 'get']);
    Route::patch('restaurant/{id}', [RestaurantController::class, 'update']);
    Route::delete('restaurant/{id}', [RestaurantController::class, 'delete']);

    Route::get('restaurant/{restaurant_id}/phones', [RestaurantPhoneController::class, 'getAll']);
    Route::post('restaurant/{restaurant_id}/phone', [RestaurantPhoneController::class, 'create']);
    Route::get('restaurant/{restaurant_id}/phone/{id}', [RestaurantPhoneController::class, 'get']);
    Route::patch('restaurant/{restaurant_id}/phone/{id}', [RestaurantPhoneController::class, 'update']);
    Route::delete('restaurant/{restaurant_id}/phone/{id}', [RestaurantPhoneController::class, 'delete']);

    Route::get('restaurant/{restaurant_id}/business_hours', [RestaurantBusinessHourController::class, 'getAll']);
    Route::post('restaurant/{restaurant_id}/business_hour', [RestaurantBusinessHourController::class, 'create']);
    Route::get('restaurant/{restaurant_id}/business_hour/{id}', [RestaurantBusinessHourController::class, 'get']);
    Route::patch('restaurant/{restaurant_id}/business_hour/{id}', [RestaurantBusinessHourController::class, 'update']);
    Route::delete('restaurant/{restaurant_id}/business_hour/{id}', [RestaurantBusinessHourController::class, 'delete']);
  });
});
