<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\AddressesNotFoundException;
use App\Domains\User\Repositories\UserAddressRepository;

class GetAllAddresses
{
  private $user_id;

  public function __construct(string $user_id)
  {
    $this->user_id = $user_id;
  }

  public function execute()
  {
    $addressRepository = new UserAddressRepository();

    if (!$addresses = $addressRepository->getAll($this->user_id)) {
      throw new AddressesNotFoundException();
    }

    return $addresses;
  }
}
