<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\AddressNotFoundException;
use App\Domains\User\Repositories\UserAddressRepository;
use Illuminate\Support\Facades\Hash;

class UpdateAddress
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $addressRepository = new UserAddressRepository();

    if (!$addressRepository->get($this->data['id'], $this->data['user_id'])) {
      throw new AddressNotFoundException();
    }

    return $addressRepository->update($this->data);
  }
}
