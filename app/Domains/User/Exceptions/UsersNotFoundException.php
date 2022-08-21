<?php

namespace App\Domains\User\Exceptions;

use App\Exceptions\JsonException;

class UsersNotFoundException extends JsonException
{
  protected $message = "Users not found.";
  protected $code = 404;
}
