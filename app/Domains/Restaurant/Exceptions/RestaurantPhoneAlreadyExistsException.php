<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantPhoneAlreadyExistsException extends JsonException
{
  protected $message = "Restaurant phone already exists.";
  protected $code = 404;
}
