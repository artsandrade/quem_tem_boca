<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantNotFoundException extends JsonException
{
  protected $message = "Restaurant not found.";
  protected $code = 404;
}
