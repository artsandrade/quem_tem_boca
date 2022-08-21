<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Repositories\UserAddressRepository;

class CreateAddress
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $addressRepository = new UserAddressRepository();

    return $addressRepository->create($this->data);
  }
}
