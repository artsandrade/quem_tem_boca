<?php

namespace App\Domains\Menu\Resources;

use App\Domains\Menu\Resources\CategoryResource;
use App\Domains\Restaurant\Resources\RestaurantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
      'description' => $this->description,
      'price' => $this->price,
      'status' => (bool) $this->status,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    if ($restaurant = $this->whenLoaded('restaurant')) {
      $data['restaurant'] = new RestaurantResource($restaurant);
    }

    if ($menu_category = $this->whenLoaded('menu_category')) {
      $data['menu_category'] = new CategoryResource($menu_category);
    }

    return $data;
  }
}
