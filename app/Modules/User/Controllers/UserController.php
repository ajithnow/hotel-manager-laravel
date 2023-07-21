<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepositoryInterface as UserRepo;
use App\Modules\User\Requests\CreateUserRequest;
use App\Modules\User\Requests\ShowUserRequest;
use App\Modules\User\Resources\UserCreatedResource;
use App\Modules\User\Resources\UserResource;
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
    public function store(CreateUserRequest $request, UserRepo $repo)
    {
        $user = $repo->create(user: $request->validated());
        return new UserCreatedResource($user);
    }

    /**
     * @OA\Get(
     *     path="/user/show",
     *     tags={"Users"},
     *     summary="Get User by UUID",
     *     description="Get a user by UUID.",
     *     operationId="getUserByUUID",
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="uuid"
     *         ),
     *         description="The UUID of the user to retrieve."
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Schema(ref="#/components/schemas/UserResource")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not Found"
     *     )
     * )
     */
    public function show(ShowUserRequest $request, UserRepo $repo)
    {
        $user = $repo->findByUUID(uuid: $request->id);
        return new UserResource($user);
    }
}
