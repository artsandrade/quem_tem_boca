<?php

namespace App\Domains\Menu\Repositories;

use App\Domains\Menu\Models\MenuItem;

class MenuItemRepository
{
  public function getAll(string $restaurant_id, string $menu_category_id)
  {
    return MenuItem::where([
      'restaurant_id' => $restaurant_id,
      'menu_category_id' => $menu_category_id,
    ])->paginate();
  }

  public function getByName(string $restaurant_id, string $menu_category_id, string $name)
  {
    return MenuItem::where([
      'restaurant_id' => $restaurant_id,
      'menu_category_id' => $menu_category_id,
      'name' => $name,
    ])->first();
  }

  public function create(array $data)
  {
    return MenuItem::create($data);
  }

  public function get(string $id, string $restaurant_id, string $menu_category_id)
  {
    return MenuItem::where([
      'id' => $id,
      'restaurant_id' => $restaurant_id,
      'menu_category_id' => $menu_category_id,
      ])->first();
  }

  public function update(array $data)
  {
    $restaurant = MenuItem::find($data['id']);

    foreach ($data as $key => $value) {
      $restaurant->{$key} = $value;
    }

    return $restaurant->save();
  }

  public function delete(string $id)
  {
    return MenuItem::find($id)->delete();
  }
}
