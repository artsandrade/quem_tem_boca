<?php

namespace App\Domains\Restaurant\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantBusinessHourResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $data = [
      'id' => $this->id,
      'weekday' => $this->weekday,
      'from' => (string) $this->from,
      'to' => (string) $this->to,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant = $this->whenLoaded('restaurant')) {
      $data['restaurant'] = new RestaurantResource($restaurant);
    }

    return $data;
  }
}
