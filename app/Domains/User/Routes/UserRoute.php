<?php

use App\Domains\User\Controllers\UserAddressController;
use App\Domains\User\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
  'prefix' => 'api/v1'
], function () {
  Route::post('user', [UserController::class, 'create']);

  Route::middleware('jwt')->group(function () {
    Route::get('users', [UserController::class, 'getAll']);
    Route::get('user/{id}', [UserController::class, 'get']);
    Route::patch('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'delete']);

    Route::get('user/{user_id}/addresses', [UserAddressController::class, 'getAll']);
    Route::post('user/{user_id}/address', [UserAddressController::class, 'create']);
    Route::get('user/{user_id}/address/{id}', [UserAddressController::class, 'get']);
    Route::patch('user/{user_id}/address/{id}', [UserAddressController::class, 'update']);
    Route::delete('user/{user_id}/address/{id}', [UserAddressController::class, 'delete']);
  });
});
