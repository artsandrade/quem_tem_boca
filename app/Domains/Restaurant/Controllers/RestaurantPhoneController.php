<?php

namespace App\Domains\Restaurant\Controllers;

use App\Domains\Restaurant\Actions as RestaurantActions;
use App\Domains\Restaurant\Requests as RestaurantRequests;
use App\Domains\Restaurant\Resources\RestaurantPhoneResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class RestaurantPhoneController extends Controller
{
  use HttpResponse;

  public function getAll(string $restaurant_id)
  {
    $restaurantPhones = new RestaurantActions\GetAllPhones($restaurant_id);

    return new RestaurantPhoneResource($restaurantPhones->execute());
  }

  public function create(RestaurantRequests\CreateRestaurantPhoneRequest $request, string $restaurant_id)
  {
    $data = $request->all();
    $data['restaurant_id'] = $restaurant_id;

    $restaurantPhone = new RestaurantActions\CreatePhone($data);

    return new RestaurantPhoneResource($restaurantPhone->execute());
  }

  public function get(string $restaurant_id, string $id)
  {
    $restaurantPhone = new RestaurantActions\GetPhone($id, $restaurant_id);

    return new RestaurantPhoneResource($restaurantPhone->execute());
  }

  public function update(RestaurantRequests\UpdateRestaurantPhoneRequest $request, string $restaurant_id, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;
    $data['restaurant_id'] = $restaurant_id;

    $restaurantPhone = new RestaurantActions\UpdatePhone($data);

    $restaurantPhone->execute();

    return $this->response('Restaurant phone updated.', 200);
  }

  public function delete(string $restaurant_id, string $id)
  {
    $restaurantPhone = new RestaurantActions\DeletePhone($id, $restaurant_id);

    $restaurantPhone->execute();

    return $this->response('Restaurant phone deleted.', 200);
  }
}
