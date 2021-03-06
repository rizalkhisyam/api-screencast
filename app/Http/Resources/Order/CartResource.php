<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Screencast\PlaylistResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'playlist' => new PlaylistResource($this->playlist),
            'price' => $this->price,
        ];
    }
}
