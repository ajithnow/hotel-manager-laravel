<?php

namespace App\Modules\User\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {   
        return [
            'message' => 'User fetched successfully.',
            'data' => [
                'user_uuid' => $this->uuid,
                'user_name' => $this->name,
                'created_at' => $this->created_at
            ],
            'status' => 'success',
            'code' => 201,
        ];
    }
}
