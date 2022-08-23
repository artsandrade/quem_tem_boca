<?php

namespace App\Domains\Restaurant\Resources;

use App\Domains\Category\Resources\CategoryResource;
use App\Domains\File\Resources\FileResource;
use App\Support\Mask\Mask;
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
    $delivery_fee = 0;
    if(!empty($this->delivery_fee)){
      $mask = new Mask();
      $delivery_fee = $mask->toNumberHtml($this->delivery_fee);
    }

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
      'delivery_fee' => $delivery_fee,
      'status' =>  (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant_phone = $this->whenLoaded('restaurant_phone')) {
      $data['phone'] = RestaurantPhoneResource::collection($restaurant_phone);
    }

    if ($restaurant_business_hour = $this->whenLoaded('restaurant_business_hour')) {
      $data['business_hour'] = RestaurantBusinessHourResource::collection($restaurant_business_hour);
    }

    if ($category = $this->whenLoaded('category')) {
      $data['category'] = new CategoryResource($category);
    }

    if ($file = $this->whenLoaded('file')) {
      $data['file'] = new FileResource($file);
    }

    return $data;
  }
}
