<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceRequestResource extends JsonResource
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
            'user' => new UserResource($this->whenLoaded('user')),
            'appliance_type' => $this->appliance_type,
            'brand' => $this->brand,
            'problem_details' => $this->problem_details,
            'collection_address' => $this->collection_address,
            'service_type' => $this->service_type,
            'preferred_contact_method' => $this->preferred_contact_method,
            'damaged_appliance_image' => $this->getFirstMediaUrl(),
            'application_date' => $this->application_date,
            'created_at' => $this->created_at ? $this->created_at->format('d/M/Y H:i:s') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d/M/Y H:i:s') : null,
        ];
    }
}
