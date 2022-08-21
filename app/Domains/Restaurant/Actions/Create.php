<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\Restaurant\Exceptions\RestaurantAlreadyExistsException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;
use App\Domains\User\Actions as UserActions;
use App\Support\Mask\Mask;

class Create
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if ($restaurantRepository->getByDocument($this->data['document'])) {
      throw new RestaurantAlreadyExistsException();
    }

    $restaurant = $restaurantRepository->create($this->data);

    $phone = new Mask();
    $phone = $phone->removeCharacters($this->data['user_phone']);
    $user = [
      'restaurant_id' => $restaurant->id,
      'name' => $this->data['user_name'],
      'email' => $this->data['user_email'],
      'password' => $this->data['user_password'],
      'phone' => $phone,
      'user_type' => 'restaurant',
    ];

    $userCreate = new UserActions\Create($user);
    $userCreate->execute();

    return $restaurant;
  }
}
