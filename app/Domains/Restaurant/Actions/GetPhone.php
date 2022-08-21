<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantPhoneNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantPhoneRepository;

class GetPhone
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
    $restaurantPhoneRepository = new RestaurantPhoneRepository();

    if (!$restaurantPhone = $restaurantPhoneRepository->get($this->id, $this->restaurant_id)) {
      throw new RestaurantPhoneNotFoundException();
    }

    return $restaurantPhone;
  }
}
