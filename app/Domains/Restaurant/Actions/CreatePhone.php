<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantAlreadyExistsException;
use App\Domains\Restaurant\Repositories\RestaurantPhoneRepository;
use App\Support\Mask\Mask;

class CreatePhone
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $restaurantPhoneRepository = new RestaurantPhoneRepository();

    $mask = new Mask();
    $this->data['number'] = $mask->removeCharacters($this->data['number']);

    if ($restaurantPhoneRepository->getByNumber($this->data['restaurant_id'], $this->data['number'])) {
      throw new RestaurantAlreadyExistsException();
    }

    return $restaurantPhoneRepository->create($this->data);
  }
}
