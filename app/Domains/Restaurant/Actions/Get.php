<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;

class Get
{
  private $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if (!$restaurant = $restaurantRepository->get($this->id)) {
      throw new RestaurantNotFoundException();
    }

    return $restaurant;
  }
}
