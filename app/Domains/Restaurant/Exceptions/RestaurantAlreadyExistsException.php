<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantAlreadyExistsException extends JsonException
{
  protected $message = "Restaurant already exists.";
  protected $code = 404;
}
