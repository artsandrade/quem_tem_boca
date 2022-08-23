<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantsNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;

class GetAllByName
{
  private $name;
  public function __construct(?string $name)
  {
    $this->name = $name;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if (!$restaurants = $restaurantRepository->getAllByName($this->name)) {
      throw new RestaurantsNotFoundException();
    }

    return $restaurants;
  }
}
