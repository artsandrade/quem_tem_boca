<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\UserNotFoundException;
use App\Domains\User\Repositories\UserRepository;

class Delete
{
  private $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function execute()
  {
    $userRepository = new UserRepository();

    if (!$userRepository->get($this->id)) {
      throw new UserNotFoundException();
    }

    return $userRepository->delete($this->id);
  }
}
