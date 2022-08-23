<?php

namespace App\Domains\Restaurant\Actions;

use App\Domains\File\Actions as FileActions;
use App\Domains\Restaurant\Exceptions\RestaurantAlreadyExistsException;
use App\Domains\Restaurant\Repositories\RestaurantRepository;
use App\Domains\User\Actions as UserActions;
use App\Support\Mask\Mask;

class Create
{
  private $data;
  private $request;

  public function __construct(array $data, $request)
  {
    $this->data = $data;
    $this->request = $request;
  }

  public function execute()
  {
    $restaurantRepository = new RestaurantRepository();

    if ($restaurantRepository->getByDocument($this->data['document'])) {
      throw new RestaurantAlreadyExistsException();
    }

    if (isset($this->data['category'])) {
      $this->data['category_id'] = $this->data['category'];
    }

    $fileAction = new FileActions\Create($this->request, 'logo', 'logo');
    $file = $fileAction->execute();
    $this->data['file_id'] = $file->id;

    $mask = new Mask();
    if (isset($this->data['delivery_fee'])) {
      $this->data['delivery_fee'] = $mask->toNumberDb($this->data['delivery_fee']);
    }

    $restaurant = $restaurantRepository->create($this->data);
    $phone = $mask->removeCharacters($this->data['user_phone']);
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
