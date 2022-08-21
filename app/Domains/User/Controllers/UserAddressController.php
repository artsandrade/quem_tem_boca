<?php

namespace App\Domains\User\Controllers;

use App\Domains\User\Actions as AddressActions;
use App\Domains\User\Requests as AddressRequests;
use App\Domains\User\Resources\UserAddressResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class UserController extends Controller
{
  use HttpResponse;

  public function getAll(string $user_id)
  {
    $addresses = new AddressActions\GetAllAddresses($user_id);

    return new UserAddressResource($addresses->execute());
  }

  public function create(AddressRequests\CreateAddressRequest $request, string $user_id)
  {
    $data = $request->all();
    $data['user_id'] = $user_id;

    $address = new AddressActions\CreateAddress($data);

    return new UserAddressResource($address->execute());
  }

  public function get(string $user_id, string $id)
  {
    $address = new AddressActions\GetAddress($id, $user_id);

    return new UserAddressResource($address->execute());
  }

  public function update(AddressRequests\UpdateAddressRequest $request, string $user_id, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;
    $data['user_id'] = $user_id;

    $address = new AddressActions\UpdateAddress($data);

    $address->execute();

    return $this->response('Address updated.', 200);
  }

  public function delete(string $user_id, string $id)
  {
    $address = new AddressActions\DeleteAddress($id, $user_id);

    $address->execute();

    return $this->response('Address deleted.', 200);
  }
}
