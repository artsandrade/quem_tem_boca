<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantBusinessHourNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantBusinessHourRepository;

class GetBusinessHour
{
  private $id;
  private $restaurant_id;

  public function __construct(string $id, string $restaurant_id)
  {
    $this->id = $id;
    $this->restaurant_id = $restaurant_id;
  }

  public function execute()
  {
    $restaurantBusinessHourRepository = new RestaurantBusinessHourRepository();

    if (!$restaurantBusinessHour = $restaurantBusinessHourRepository->get($this->id, $this->restaurant_id)) {
      throw new RestaurantBusinessHourNotFoundException();
    }

    return $restaurantBusinessHour;
  }
}
