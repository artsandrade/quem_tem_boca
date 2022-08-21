<?php

namespace App\Domains\Menu\Repositories;

use App\Domains\Menu\Models\MenuCategory;

class MenuCategoryRepository
{
  public function getAll(string $restaurant_id)
  {
    return MenuCategory::where('restaurant_id', $restaurant_id)->paginate();
  }

  public function getByName(string $restaurant_id, string $name)
  {
    return MenuCategory::where([
      'restaurant_id' => $restaurant_id,
      'name' => $name,
    ])->first();
  }

  public function create(array $data)
  {
    return MenuCategory::create($data);
  }

  public function get(string $id, string $restaurant_id)
  {
    return MenuCategory::where([
      'id' => $id,
      'restaurant_id' => $restaurant_id,
    ])->first();
  }

  public function update(array $data)
  {
    $restaurant = MenuCategory::find($data['id']);

    foreach ($data as $key => $value) {
      $restaurant->{$key} = $value;
    }

    return $restaurant->save();
  }

  public function delete(string $id)
  {
    return MenuCategory::find($id)->delete();
  }
}
