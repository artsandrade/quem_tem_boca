<?php

namespace App\Domains\Restaurant\Repositories;

use App\Domains\Restaurant\Models\RestaurantPhone;

class RestaurantPhoneRepository
{
  public function getAll(string $restaurant_id)
  {
    return RestaurantPhone::where('restaurant_id', $restaurant_id)->get();
  }

  public function getByNumber(string $restaurant_id, string $number)
  {
    return RestaurantPhone::where([
      'restaurant_id' => $restaurant_id,
      'number' => $number,
    ])->first();
  }

  public function create(array $data)
  {
    return RestaurantPhone::create($data);
  }

  public function get(string $id, string $restaurant_id)
  {
    return RestaurantPhone::where([
      'id' => $id,
      'restaurant_id' => $restaurant_id,
    ])->first();
  }

  public function update(array $data)
  {
    $restaurant = RestaurantPhone::find($data['id']);

    foreach ($data as $key => $value) {
      $restaurant->{$key} = $value;
    }

    return $restaurant->save();
  }

  public function delete(string $id)
  {
    return RestaurantPhone::find($id)->delete();
  }
}
