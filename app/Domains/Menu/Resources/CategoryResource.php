<?php

namespace App\Domains\Menu\Resources;

use App\Domains\Restaurant\Resources\RestaurantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
      'status' => (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant = $this->whenLoaded('restaurant')) {
      $data['restaurant'] = new RestaurantResource($restaurant);
    }

    if ($menu_item = $this->whenLoaded('menu_item')) {
      $data['menu_item'] = ItemResource::collection($menu_item);
    }

    return $data;
  }
}
