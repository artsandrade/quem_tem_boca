<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantPhoneNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantPhoneRepository;

class UpdatePhone
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $restaurantPhoneRepository = new RestaurantPhoneRepository();

    if (!$restaurantPhoneRepository->get($this->data['id'], $this->data['restaurant_id'])) {
      throw new RestaurantPhoneNotFoundException();
    }

    return $restaurantPhoneRepository->update($this->data);
  }
}
