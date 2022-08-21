<?php

namespace App\Domains\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'access_token' => $this->resource['access_token'],
            'expires_in' => $this->resource['expires_in'],
            'user' => array(
                'uuid' => $this->resource['user']->uuid,
                'name' => $this->resource['user']->name,
                'email' => $this->resource['user']->email,
                'country_phone_code' => $this->resource['user']->country_phone_code,
                'phone' => $this->resource['user']->phone,
                'locale' => $this->resource['user']->locale,
                'email_verified_at' => $this->resource['user']->email_verified_at,
                'phone_verified_at' => $this->resource['user']->phone_verified_at,
            )
        ];
    }
}