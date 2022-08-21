<?php

namespace App\Domains\Menu\Exceptions;

use App\Exceptions\JsonException;

class ItemsNotFoundException extends JsonException
{
  protected $message = "Items not found.";
  protected $code = 404;
}
