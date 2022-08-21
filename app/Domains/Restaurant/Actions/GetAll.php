<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantsNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;

class GetAll
{
  public function __construct()
  {
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if (!$restaurants = $restaurantRepository->getAll()) {
      throw new RestaurantsNotFoundException();
    }

    return $restaurants;
  }
}
