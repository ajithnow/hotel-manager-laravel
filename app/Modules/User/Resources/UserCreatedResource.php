<?php

namespace App\Modules\User\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

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
                'created_at' => $this->created_at
            ],
            'status' => 'success',
            'code' => 201,
        ];
    }
}
