<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantsNotFoundException extends JsonException
{
  protected $message = "Restaurants not found.";
  protected $code = 404;
}
