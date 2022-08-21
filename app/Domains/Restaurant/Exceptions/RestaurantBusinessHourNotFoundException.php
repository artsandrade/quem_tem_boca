<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantBusinessHourNotFoundException extends JsonException
{
  protected $message = "Restaurant business hour not found.";
  protected $code = 404;
}
