<?php

namespace App\Domains\User\Controllers;

use App\Domains\User\Actions as UserActions;
use App\Domains\User\Requests as UserRequests;
use App\Domains\User\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class UserController extends Controller
{
  use HttpResponse;

  public function getAll()
  {
    $users = new UserActions\GetAll();

    return new UserResource($users->execute());
  }

  public function create(UserRequests\CreateRequest $request)
  {
    $data = $request->all();

    $user = new UserActions\Create($data);

    return new UserResource($user->execute());
  }

  public function get(string $id)
  {
    $user = new UserActions\Get($id);

    return new UserResource($user->execute());
  }

  public function update(UserRequests\UpdateRequest $request, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;

    $user = new UserActions\Update($data);

    $user->execute();

    return $this->response('User updated.', 200);
  }

  public function delete(string $id)
  {
    $user = new UserActions\Delete($id);

    $user->execute();

    return $this->response('User deleted.', 200);
  }
}
