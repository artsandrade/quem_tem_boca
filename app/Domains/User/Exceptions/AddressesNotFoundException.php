<?php

namespace App\Domains\User\Exceptions;

use App\Exceptions\JsonException;

class AddressesNotFoundException extends JsonException
{
  protected $message = "Addresses not found.";
  protected $code = 404;
}
