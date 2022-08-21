<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantPhoneNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantPhoneRepository;

class GetAllPhones
{
  private $restaurant_id;

  public function __construct(string $restaurant_id)
  {
    $this->restaurant_id = $restaurant_id;
  }

  public function execute()
  {
    $restaurantPhonesRepository = new RestaurantPhoneRepository();

    if (!$restaurantPhones = $restaurantPhonesRepository->getAll($this->restaurant_id)) {
      throw new RestaurantPhoneNotFoundException();
    }

    return $restaurantPhones;
  }
}
