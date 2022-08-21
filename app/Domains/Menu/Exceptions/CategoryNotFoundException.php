<?php

namespace App\Domains\Menu\Exceptions;

use App\Exceptions\JsonException;

class CategoryNotFoundException extends JsonException
{
  protected $message = "Category not found.";
  protected $code = 404;
}
