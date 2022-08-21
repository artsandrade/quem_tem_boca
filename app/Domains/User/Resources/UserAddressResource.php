<?php

namespace App\Domains\User\Resources;

use App\Domains\Restaurant\Resources\RestaurantResource;
use App\Support\Mask\Mask;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressResource extends JsonResource
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
      'zip_code' => $this->zip_code,
      'street' => $this->street,
      'complement' => $this->complement,
      'neighborhood' => $this->neighborhood,
      'city' => $this->city,
      'state' => $this->state,
      'latitude' => $this->latitude,
      'longitude' => $this->longitude,
      'status' =>  (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($user = $this->whenLoaded('user')) {
      $data['user'] = new UserResource($user);
    }

    return $data;
  }
}
