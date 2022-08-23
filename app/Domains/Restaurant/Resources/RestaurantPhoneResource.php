<?php

namespace App\Domains\Restaurant\Resources;

use App\Support\Mask\Mask;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantPhoneResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $phone = new Mask();
    $phone = $phone->toPhoneHtml($this->number);

    $data = [
      'id' => $this->id,
      'number' => $phone,
      'status' =>  (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant = $this->whenLoaded('restaurant')) {
      $data['restaurant'] = RestaurantResource::collection($restaurant);
    }

    return $data;
  }
}
