<?php

namespace App\Domains\File\Exceptions;

use App\Exceptions\JsonException;

class FileCantBeSavedException extends JsonException
{
  protected $message = "File can't be saved.";
  protected $code = 404;
}
