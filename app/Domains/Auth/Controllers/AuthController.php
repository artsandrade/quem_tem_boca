<?php

namespace App\Domains\Auth\Controllers;

use App\Http\Controllers\Controller;

use App\Domains\Auth\Actions as AuthActions;
use App\Domains\Auth\Requests\LoginRequest;
use App\Domains\User\Resources\UserResource;
use App\Traits\HttpResponse;

class AuthController extends Controller
{
    use HttpResponse;

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $auth = new AuthActions\Login($data);

        return $auth->execute();
    }

    public function logout()
    {
        $auth = new AuthActions\Logout();
        $auth->execute();

        return $this->response('Disconnected user.', 200);
    }

    public function me()
    {
        $auth = new AuthActions\Me();

        return new UserResource($auth->execute());
    }
}
