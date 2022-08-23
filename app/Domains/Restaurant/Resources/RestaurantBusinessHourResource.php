<?php

namespace App\Domains\Restaurant\Resources;

use App\Support\Mask\Mask;
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
    $weekday = new Mask();

    $data = [
      'id' => $this->id,
      'weekday' => $this->weekday,
      'weekday_pt' => $weekday->toWeekdayPt($this->weekday),
      'from' => date('H:i', strtotime($this->from)),
      'to' => date('H:i', strtotime($this->to)),
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant = $this->whenLoaded('restaurant')) {
      $data['restaurant'] = RestaurantResource::collection($restaurant);
    }

    return $data;
  }
}
