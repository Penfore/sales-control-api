<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
        'seller' => new UserResource($this->whenLoaded('seller')),
        'unit' => new UnitResource($this->whenLoaded('unit')),
        'closest_unit' => new UnitResource($this->whenLoaded('closestUnit')),
        'amount' => $this->amount,
        'sale_date' => $this->sale_date,
        'latitude' => $this->when($this->latitude !== null, $this->latitude),
        'longitude' => $this->when($this->longitude !== null, $this->longitude),
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
      ];
    }
}
