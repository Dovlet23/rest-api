<?php

namespace App\Http\Resources\Menu;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResources extends JsonResource
{
    public function toArray(Request $request)
    {
        return MenuResource::collection($this->resource);
    }
}
