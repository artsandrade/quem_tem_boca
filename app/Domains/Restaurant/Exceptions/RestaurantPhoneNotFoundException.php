<?php

namespace App\Domains\Restaurant\Exceptions;

use App\Exceptions\JsonException;

class RestaurantPhoneNotFoundException extends JsonException
{
  protected $message = "Restaurant phone not found.";
  protected $code = 404;
}
