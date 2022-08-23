<?php

namespace App\Domains\Restaurant\Repositories;

use App\Domains\Restaurant\Models\Restaurant;

class RestaurantRepository
{
  public function getAll()
  {
    return Restaurant::with(['category', 'file'])->get();
  }

  public function getAllByCategory(string $category)
  {
    return Restaurant::with(['category', 'file'])->whereHas('category', function ($query) use ($category) {
      return $query->where('name', '=', $category);
    })->get();
  }

  public function getAllByName(?string $name)
  {
    return Restaurant::with(['category', 'file'])->where('name', 'like', '%' . $name . '%')->get();
  }

  public function create(array $data)
  {
    return Restaurant::create($data);
  }

  public function get(string $id)
  {
    return (Restaurant::with(['category', 'file', 'restaurant_business_hour', 'restaurant_phone'])->where('id', $id)->first());
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
