<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;

class Delete
{
  private $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if (!$restaurantRepository->get($this->id)) {
      throw new RestaurantNotFoundException();
    }

    return $restaurantRepository->delete($this->id);
  }
}
