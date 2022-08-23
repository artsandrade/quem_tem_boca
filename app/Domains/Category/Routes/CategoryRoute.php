<?php

use App\Domains\Category\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group([
  'prefix' => 'api/v1'
], function () {
  Route::get('categories', [CategoryController::class, 'getAll']);
  Route::post('category', [CategoryController::class, 'create']);
  Route::get('category/{id}', [CategoryController::class, 'get']);
  Route::patch('category/{id}', [CategoryController::class, 'update']);
  Route::delete('category/{id}', [CategoryController::class, 'delete']);
});
