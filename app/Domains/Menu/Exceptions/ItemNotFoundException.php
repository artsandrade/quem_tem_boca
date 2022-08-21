<?php

namespace App\Domains\Menu\Exceptions;

use App\Exceptions\JsonException;

class ItemNotFoundException extends JsonException
{
  protected $message = "Item not found.";
  protected $code = 404;
}
