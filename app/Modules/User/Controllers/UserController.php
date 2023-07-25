<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Repositories\UserProfileRepositoryInterface as UserProfileRepo;
use App\Modules\User\Repositories\UserRepositoryInterface as UserRepo;
use App\Modules\User\Requests\CreateUserProfileRequest as CreateUserProfileRequest;
use App\Modules\User\Requests\CreateUserRequest;
use App\Modules\User\Requests\DeleteUserRequest;
use App\Modules\User\Requests\ShowUserRequest;
use App\Modules\User\Resources\UserCreatedResource;
use App\Modules\User\Resources\UserDeletedResource;
use App\Modules\User\Resources\UserProfileResource as UserProfileResource;
use App\Modules\User\Resources\UserResource;

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
     *     path="/user/{id}",
     *     tags={"Users"},
     *     summary="Get User by UUID",
     *     description="Get a user by UUID.",
     *     operationId="getUserByUUID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
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
        $user = $repo->get(id: $request->id);
        return (new UserResource($user))->response()->setStatusCode(200);
    }

    /**
     * @OA\Delete(
     *     path="/user/{id}",
     *     operationId="deleteUserByUUID",
     *     summary="Delete User by UUID",
     *     description="Delete a user by UUID.",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="The UUID of the user to delete.",
     *         @OA\Schema(
     *             type="string",
     *             format="uuid"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="User deleted successfully"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="User not found"
     *     )
     * )
     */
    public function destroy(DeleteUserRequest $request, UserRepo $repo)
    {   
        $user = $repo->delete(id :$request->id);
        return (new UserDeletedResource($user))->response()->setStatusCode(200);
    }

    /**
     * @OA\Post(
     *     path="/user/profile",
     *     summary="Create or update user profile",
     *     description="Endpoint to create or update user profile details",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="user_id",
     *                     type="string",
     *                     example="uuid",
     *                 ),
     *                 @OA\Property(
     *                     property="address_line_1",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="address_line_2",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="city",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="state",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="country",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="is_verified",
     *                     type="boolean",
     *                     example=false,
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User profile created/updated successfully"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function createProfile(CreateUserProfileRequest $request, UserProfileRepo $repo)
    {
        return (new UserProfileResource($repo->create($request->validated())))
            ->response()
            ->setStatusCode(201);
    }
}
