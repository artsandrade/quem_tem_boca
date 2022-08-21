<?php

namespace App\Domains\Restaurant\Repositories;

use App\Domains\Restaurant\Models\RestaurantBusinessHour;

class RestaurantBusinessHourRepository
{
  public function getAll(string $restaurant_id)
  {
    return RestaurantBusinessHour::where('restaurant_id', $restaurant_id)->paginate();
  }

  public function create(array $data)
  {
    return RestaurantBusinessHour::create($data);
  }

  public function getByWeekday(string $restaurant_id, string $weekday)
  {
    return RestaurantBusinessHour::where([
      'restaurant_id' => $restaurant_id,
      'weekday' => $weekday,
    ])->first();
  }

  public function get(string $id, string $restaurant_id)
  {
    return RestaurantBusinessHour::where([
      'id' => $id,
      'restaurant_id' => $restaurant_id,
    ])->first();
  }

  public function update(array $data)
  {
    $restaurant = RestaurantBusinessHour::find($data['id']);

    foreach ($data as $key => $value) {
      $restaurant->{$key} = $value;
    }

    return $restaurant->save();
  }

  public function delete(string $id)
  {
    return RestaurantBusinessHour::find($id)->delete();
  }
}
