<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantBusinessHourAlreadyExistsException extends JsonException
{
  protected $message = "Restaurant business hour already exists.";
  protected $code = 404;
}
