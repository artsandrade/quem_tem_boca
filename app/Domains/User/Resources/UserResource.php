<?php

namespace App\Domains\User\Resources;

use App\Domains\Restaurant\Resources\RestaurantResource;
use App\Support\Mask\Mask;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
    $phone = $phone->toPhoneHtml($this->phone);

    $data = [
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $phone,
      'status' =>  (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant = $this->whenLoaded('restaurant')) {
      $data['restaurant'] = new RestaurantResource($restaurant);
    }

    if ($user_address = $this->whenLoaded('user_address')) {
      $data['addresses'] = new UserAddressResource($user_address);
    }

    return $data;
  }
}
