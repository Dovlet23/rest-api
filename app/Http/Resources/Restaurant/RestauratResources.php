<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestauratResources extends JsonResource
{
    public function toArray(Request $request)
{
    return RestaurantResource::collection($this->resource);
}
}
