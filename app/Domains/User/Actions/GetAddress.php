<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\AddressNotFoundException;
use App\Domains\User\Repositories\UserAddressRepository;

class GetAddress
{
  private $id;
  private $user_id;

  public function __construct(string $id, string $user_id)
  {
    $this->id = $id;
    $this->user_id = $user_id;
  }

  public function execute()
  {
    $addressRepository = new UserAddressRepository();

    if (!$address = $addressRepository->get($this->id, $this->user_id)) {
      throw new AddressNotFoundException();
    }

    return $address;
  }
}
