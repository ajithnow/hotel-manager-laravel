<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Repositories\UserRepositoryInterface as UserRepo;
use App\Modules\User\Requests\CreateUserRequest;
use App\Modules\User\Resources\UserCreatedResource;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/user/create",
     *     summary="Create a new user",
     *     description="Endpoint to create a new user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string",
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(CreateUserRequest $request, UserRepo $userRepo)
    {   
        $user = $userRepo->create(user: $request->validated());
        return new UserCreatedResource($user);
    }
}
