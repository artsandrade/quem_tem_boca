<?php

namespace App\Domains\Restaurant\Repositories;

use App\Domains\Restaurant\Models\Restaurant;

class RestaurantRepository
{
  public function getAll()
  {
    return Restaurant::paginate();
  }

  public function create(array $data)
  {
    return Restaurant::create($data);
  }

  public function get(string $id)
  {
    return(Restaurant::with('restaurant_business_hour')->where('id', $id)->first());
  }

  public function getByDocument(string $document)
  {
    return Restaurant::where('document', $document)->first();
  }

  public function update(array $data)
  {
    $restaurant = Restaurant::find($data['id']);

    foreach ($data as $key => $value) {
      $restaurant->{$key} = $value;
    }

    return $restaurant->save();
  }

  public function delete(string $id)
  {
    return Restaurant::find($id)->delete();
  }
}
