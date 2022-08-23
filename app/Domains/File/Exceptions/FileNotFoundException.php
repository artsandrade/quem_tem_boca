<?php

namespace App\Domains\File\Exceptions;

use App\Exceptions\JsonException;

class FileNotFoundException extends JsonException
{
  protected $message = "File not found.";
  protected $code = 404;
}
