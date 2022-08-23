<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantNotFoundException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;
use App\Support\Mask\Mask;

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

    if (isset($this->data['category'])) {
      $this->data['category_id'] = $this->data['category'];
    }

    if (isset($this->data['delivery_fee'])) {
      $mask = new Mask();
      $this->data['delivery_fee'] = $mask->toNumberDb($this->data['delivery_fee']);
    }

    return $restaurantRepository->update($this->data);
  }
}
