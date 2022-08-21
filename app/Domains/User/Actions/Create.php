<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\UserAlreadyExistsException;
use App\Domains\User\Repositories\UserRepository;
use App\Support\Mask\Mask;
use Illuminate\Support\Facades\Hash;

class Create
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $userRepository = new UserRepository();

    if ($userRepository->getByEmail($this->data['email'])) {
      throw new UserAlreadyExistsException();
    }

    $mask = new Mask();
    $this->data['phone'] = $mask->removeCharacters($this->data['phone']);

    if (isset($this->data['password']) && !is_null($this->data['password'])) {
      $this->data['password'] = Hash::make($this->data['password']);
    }

    return $userRepository->create($this->data);
  }
}
