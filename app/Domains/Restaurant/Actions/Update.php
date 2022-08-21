<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;

class Update
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if (!$restaurantRepository->get($this->data['id'])) {
      throw new RestaurantNotFoundException();
    }

    return $restaurantRepository->update($this->data);
  }
}
