<?php

namespace App\Domains\Menu\Exceptions;

use App\Exceptions\JsonException;

class CategoryAlreadyExistsException extends JsonException
{
  protected $message = "Category already exists.";
  protected $code = 404;
}
