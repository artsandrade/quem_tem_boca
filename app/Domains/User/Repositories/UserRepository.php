<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\User;

class UserRepository
{
  public function getAll()
  {
    return User::all();
  }

  public function create(array $data)
  {
    return User::create($data);
  }

  public function get(string $id)
  {
    return(User::where('id', $id)->first());
  }

  public function getByEmail(string $email)
  {
    return User::where('email', $email)->first();
  }

  public function update(array $data)
  {
    $user = User::find($data['id']);

    foreach ($data as $key => $value) {
      $user->{$key} = $value;
    }

    return $user->save();
  }

  public function delete(string $id)
  {
    return User::find($id)->delete();
  }
}
