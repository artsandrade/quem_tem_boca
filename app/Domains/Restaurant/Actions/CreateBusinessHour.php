<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantBusinessHourAlreadyExistsException;
use App\Domains\Restaurant\Repositories\RestaurantBusinessHourRepository;

class CreateBusinessHour
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $restaurantBusinessHourRepository = new RestaurantBusinessHourRepository();

    if ($restaurantBusinessHourRepository->getByWeekday($this->data['restaurant_id'], $this->data['weekday'])) {
      throw new RestaurantBusinessHourAlreadyExistsException();
    }

    return $restaurantBusinessHourRepository->create($this->data);
  }
}
