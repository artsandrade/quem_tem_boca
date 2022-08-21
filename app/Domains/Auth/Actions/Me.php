<?php

namespace App\Domains\Auth\Actions;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Domains\User\Exceptions\UserNotFoundException;

class Me
{
    public function __construct()
    {
    }

    public function execute()
    {
        if (!$me = JWTAuth::user()) {
            throw new UserNotFoundException();
        }

        return $me;
    }
}
