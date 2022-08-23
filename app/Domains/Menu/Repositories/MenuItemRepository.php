<?php

namespace App\Domains\Menu\Repositories;

use App\Domains\Menu\Models\MenuItem;
use Illuminate\Support\Facades\Hash;

class MenuItemRepository
{
  public function getAll(string $restaurant_id)
  {
    return MenuItem::where([
      'restaurant_id' => $restaurant_id,
    ])->with(['menu_category', 'file'])->orderBy('menu_category_id')->orderBy('name')->get();
  }

  public function getAllByItem(?string $name)
  {
    return MenuItem::where('name', 'like', '%' . $name . '%')->with(['menu_category', 'file', 'restaurant', 'restaurant.file', 'restaurant.category'])->groupBy('id')->get();
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
