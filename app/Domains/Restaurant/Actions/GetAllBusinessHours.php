<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantBusinessHourNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantBusinessHourRepository;

class GetAllBusinessHours
{
  private $restaurant_id;

  public function __construct(string $restaurant_id)
  {
    $this->restaurant_id = $restaurant_id;
  }

  public function execute()
  {
    $restaurantBusinessHoursRepository = new RestaurantBusinessHourRepository();

    if (!$restaurantBusinessHours = $restaurantBusinessHoursRepository->getAll($this->restaurant_id)) {
      throw new RestaurantBusinessHourNotFoundException();
    }

    return $restaurantBusinessHours;
  }
}
