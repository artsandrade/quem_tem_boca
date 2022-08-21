<?php

namespace App\Domains\User\Exceptions;

use App\Exceptions\JsonException;

class UserNotFoundException extends JsonException
{
  protected $message = "User not found.";
  protected $code = 404;
}
