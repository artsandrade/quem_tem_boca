<?php

namespace App\Domains\Menu\Exceptions;

use App\Exceptions\JsonException;

class CategoriesNotFoundException extends JsonException
{
  protected $message = "Categories not found.";
  protected $code = 404;
}
