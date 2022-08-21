<?php

namespace App\Domains\User\Exceptions;

use App\Exceptions\JsonException;

class UserAlreadyExistsException extends JsonException
{
  protected $message = "User already exists.";
  protected $code = 404;
}
