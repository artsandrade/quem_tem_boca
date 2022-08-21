<?php

namespace App\Domains\Auth\Actions;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Domains\User\Exceptions\UserNotFoundException;

class Logout
{
    public function __construct()
    {
    }

    public function execute()
    {
        if (!JWTAuth::user()) {
            throw new UserNotFoundException();
        }

        JWTAuth::invalidate();

        return true;
    }
}
