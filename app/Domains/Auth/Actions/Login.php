<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Exceptions\InvalidCredentialsException;
use App\Domains\User\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class Login
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        //var_dump($this->data);die();
        if (!$token = auth()->attempt([
            'email' => $this->data['email'],
            'password' => $this->data['password'],
        ])) {
            throw new InvalidCredentialsException();
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => new UserResource(Auth::user())
        ];
    }
}
