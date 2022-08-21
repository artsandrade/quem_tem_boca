<?php

namespace App\Domains\Restaurant\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
      'name' => $this->name,
      'corporate_name' => $this->corporate_name,
      'document' => $this->document,
      'email' => $this->email,
      'zip_code' => $this->zip_code,
      'street' => $this->street,
      'complement' => $this->complement,
      'neighborhood' => $this->neighborhood,
      'city' => $this->city,
      'state' => $this->state,
      'latitude' => $this->latitude,
      'longitude' => $this->longitude,
      'delivery_time' => $this->delivery_time,
      'delivery_fee' => $this->delivery_fee,
      'status' =>  (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant_phone = $this->whenLoaded('restaurant_phone')) {
      $data['phone'] = new RestaurantPhoneResource($restaurant_phone);
    }

    if (isset($this->restaurant_business_hour) && !$this->restaurant_business_hour->isEmpty()) {
      $data['business_hour'] = new RestaurantBusinessHourResource($this->restaurant_business_hour);
    }

    return $data;
  }
}
