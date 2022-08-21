<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\UserAddress;

class UserAddressRepository
{
  public function getAll(string $user_id)
  {
    return UserAddress::where('user_id', $user_id)->paginate();
  }

  public function create(array $data)
  {
    return UserAddress::create($data);
  }

  public function get(string $id, string $user_id)
  {
    return UserAddress::where([
      'id' => $id,
      'user_id' => $user_id,
    ])->first();
  }

  public function update(array $data)
  {
    $address = UserAddress::find($data['id']);

    foreach ($data as $key => $value) {
      $address->{$key} = $value;
    }

    return $address->save();
  }

  public function delete(string $id)
  {
    return UserAddress::find($id)->delete();
  }
}
