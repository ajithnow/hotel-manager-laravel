<?php

namespace App\Modules\User\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCreatedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'message' => 'User created successfully.',
            'data' => [
                'user_id' => $this->id,
                'user_name' => $this->name,
            ],
            'status' => 'success',
            'code' => 201,
        ];
    }
}
