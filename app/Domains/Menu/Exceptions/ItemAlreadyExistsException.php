<?php

namespace App\Domains\Menu\Exceptions;

use App\Exceptions\JsonException;

class ItemAlreadyExistsException extends JsonException
{
  protected $message = "Item already exists.";
  protected $code = 404;
}
