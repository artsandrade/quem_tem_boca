<?php

namespace App\Domains\Restaurant\Controllers;

use App\Domains\Restaurant\Actions as RestaurantActions;
use App\Domains\Restaurant\Requests as RestaurantRequests;
use App\Domains\Restaurant\Resources\RestaurantResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class RestaurantController extends Controller
{
  use HttpResponse;

  public function getAll()
  {
    $restaurants = new RestaurantActions\GetAll();

    return new RestaurantResource($restaurants->execute());
  }

  public function create(RestaurantRequests\CreateRequest $request)
  {
    $data = $request->all();

    $restaurant = new RestaurantActions\Create($data);

    return new RestaurantResource($restaurant->execute());
  }

  public function get(string $id)
  {
    $restaurant = new RestaurantActions\Get($id);

    return new RestaurantResource($restaurant->execute());
  }

  public function update(RestaurantRequests\UpdateRequest $request, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;

    $restaurant = new RestaurantActions\Update($data);

    $restaurant->execute();

    return $this->response('Restaurant updated.', 200);
  }

  public function delete(string $id)
  {
    $restaurant = new RestaurantActions\Delete($id);

    $restaurant->execute();

    return $this->response('Restaurant deleted.', 200);
  }
}
