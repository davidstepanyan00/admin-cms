<?php

namespace App\Services\Auth\Resources;

use App\Services\Spatie\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'firstName' => $this->resource->first_name,
            'lastName' => $this->resource->last_name,
            'email' => $this->resource->email,
            'lock' => $this->resource->lock,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
