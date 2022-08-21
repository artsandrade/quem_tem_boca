<?php

namespace App\Domains\Auth\Exceptions;

use App\Exceptions\JsonException;

class InvalidCredentialsException extends JsonException
{
    protected $message = "Invalid credentials.";
    protected $code = 401;
}
