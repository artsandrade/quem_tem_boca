<?php

namespace App\Domains\Category\Resources;

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
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];
  
    return $data;
  }
}
