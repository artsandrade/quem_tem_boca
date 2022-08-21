<?php

use App\Domains\Menu\Controllers\MenuCategoryController;
use App\Domains\Menu\Controllers\MenuItemController;
use Illuminate\Support\Facades\Route;

Route::group([
  'prefix' => 'api/v1',
  'middleware' => 'jwt',
], function () {
  Route::get('restaurant/{restaurant_id}/category/{menu_category_id}/items', [MenuItemController::class, 'getAll']);
  Route::post('restaurant/{restaurant_id}/category/{menu_category_id}/item', [MenuItemController::class, 'create']);
  Route::get('restaurant/{restaurant_id}/category/{menu_category_id}/item/{id}', [MenuItemController::class, 'get']);
  Route::patch('restaurant/{restaurant_id}/category/{menu_category_id}/item/{id}', [MenuItemController::class, 'update']);
  Route::delete('restaurant/{restaurant_id}/category/{menu_category_id}/item/{id}', [MenuItemController::class, 'delete']);

  Route::get('restaurant/{restaurant_id}/categories', [MenuCategoryController::class, 'getAll']);
  Route::post('restaurant/{restaurant_id}/category', [MenuCategoryController::class, 'create']);
  Route::get('restaurant/{restaurant_id}/category/{id}', [MenuCategoryController::class, 'get']);
  Route::patch('restaurant/{restaurant_id}/category/{id}', [MenuCategoryController::class, 'update']);
  Route::delete('restaurant/{restaurant_id}/category/{id}', [MenuCategoryController::class, 'delete']);
});
