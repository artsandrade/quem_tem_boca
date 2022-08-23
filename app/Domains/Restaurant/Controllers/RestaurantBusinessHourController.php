<?php

namespace App\Domains\Restaurant\Controllers;

use App\Domains\Restaurant\Actions as RestaurantActions;
use App\Domains\Restaurant\Requests as RestaurantRequests;
use App\Domains\Restaurant\Resources\RestaurantBusinessHourResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class RestaurantBusinessHourController extends Controller
{
  use HttpResponse;

  public function getAll(string $restaurant_id)
  {
    $restaurantBusinessHours = new RestaurantActions\GetAllBusinessHours($restaurant_id);

    return RestaurantBusinessHourResource::collection($restaurantBusinessHours->execute());
  }

  public function create(RestaurantRequests\CreateRestaurantBusinessHourRequest $request, string $restaurant_id)
  {
    $data = $request->all();
    $data['restaurant_id'] = $restaurant_id;

    $restaurantBusinessHour = new RestaurantActions\CreateBusinessHour($data);

    return new RestaurantBusinessHourResource($restaurantBusinessHour->execute());
  }

  public function get(string $restaurant_id, string $id)
  {
    $restaurantBusinessHour = new RestaurantActions\GetBusinessHour($id, $restaurant_id);

    return new RestaurantBusinessHourResource($restaurantBusinessHour->execute());
  }

  public function update(RestaurantRequests\UpdateRestaurantBusinessHourRequest $request, string $restaurant_id, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;
    $data['restaurant_id'] = $restaurant_id;

    $restaurantBusinessHour = new RestaurantActions\UpdateBusinessHour($data);

    $restaurantBusinessHour->execute();

    return $this->response('Restaurant business hour updated.', 200);
  }

  public function delete(string $restaurant_id, string $id)
  {
    $restaurantBusinessHour = new RestaurantActions\DeleteBusinessHour($id, $restaurant_id);

    $restaurantBusinessHour->execute();

    return $this->response('Restaurant business hour deleted.', 200);
  }
}
