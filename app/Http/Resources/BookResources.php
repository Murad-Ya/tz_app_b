<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResources extends JsonResource
{
    public function toArray(Request $request)
    {
        return BookResource::collection($this->resource);
    }
}
