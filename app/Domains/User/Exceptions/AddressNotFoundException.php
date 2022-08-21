<?php

namespace App\Domains\User\Exceptions;

use App\Exceptions\JsonException;

class AddressNotFoundException extends JsonException
{
  protected $message = "Address not found.";
  protected $code = 404;
}
