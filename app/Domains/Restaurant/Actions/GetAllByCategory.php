<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantsNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;

class GetAllByCategory
{
  private $category;
  public function __construct(string $category)
  {
    $this->category = $category;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if (!$restaurants = $restaurantRepository->getAllByCategory($this->category)) {
      throw new RestaurantsNotFoundException();
    }

    return $restaurants;
  }
}
