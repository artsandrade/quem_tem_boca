<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Exceptions\UsersNotFoundException;
use App\Domains\User\Repositories\UserRepository;

class GetAll
{
  public function __construct()
  {
  }

  public function execute()
  {
    $userRepository = new UserRepository();

    if (!$users = $userRepository->getAll()) {
      throw new UsersNotFoundException();
    }

    return $users;
  }
}
