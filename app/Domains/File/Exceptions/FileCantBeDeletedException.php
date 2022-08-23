<?php

namespace App\Domains\File\Exceptions;

use App\Exceptions\JsonException;

class FileCantBeDeletedException extends JsonException
{
  protected $message = "File can't be deleted.";
  protected $code = 404;
}
