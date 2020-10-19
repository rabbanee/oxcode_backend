<?php

namespace App\Http\Resources\Attraction;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images = ImageResource::collection($this->image->where('thumbnail', true));
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'city' => $this->city->name,
            'images' => $images,
            'rating' => $this->rating,
            'popular' => $this->popular,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}