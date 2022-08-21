<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\UserNotFoundException;
use App\Domains\User\Repositories\UserRepository;
use App\Support\Mask\Mask;
use Illuminate\Support\Facades\Hash;

class Update
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $userRepository = new UserRepository();

    if (!$userRepository->get($this->data['id'])) {
      throw new UserNotFoundException();
    }

    if (isset($this->data['phone']) && !is_null($this->data['phone'])) {
      $mask = new Mask();
      $this->data['phone'] = $mask->removeCharacters($this->data['phone']);
    }

    if (isset($this->data['password']) && !is_null($this->data['password'])) {
      $this->data['password'] = Hash::make($this->data['password']);
    }

    return $userRepository->update($this->data);
  }
}
