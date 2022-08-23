<?php

namespace App\Domains\File\Exceptions;

use App\Exceptions\JsonException;

class FilesNotFoundException extends JsonException
{
  protected $message = "Files not found.";
  protected $code = 404;
}
