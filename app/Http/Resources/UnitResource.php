<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'latitude' => $this->latitude,
      'longitude' => $this->longitude,
      'manager' => new UserResource($this->whenLoaded('manager')),
      'sellers' => UserResource::collection($this->whenLoaded('sellers')),
      'zone_id' => $this->zone_id,
    ];
  }
}
