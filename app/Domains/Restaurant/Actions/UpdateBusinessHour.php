<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantBusinessHourNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantBusinessHourRepository;

class UpdateBusinessHour
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $restaurantBusinessHourRepository = new RestaurantBusinessHourRepository();

    if (!$restaurantBusinessHourRepository->get($this->data['id'], $this->data['restaurant_id'])) {
      throw new RestaurantBusinessHourNotFoundException();
    }

    return $restaurantBusinessHourRepository->update($this->data);
  }
}
