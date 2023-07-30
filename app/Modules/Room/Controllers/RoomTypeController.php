<?php

namespace App\Modules\Room\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Room\Repositories\RoomTypeRepositoryInterface as RoomTypeRepo;
use App\Modules\Room\Requests\CreateRoomTypeRequest;
use App\Modules\Room\Resources\RoomTypeResource as ResourcesRoomTypeResource;

class RoomTypeController extends Controller
{
    /**
     *
     * @OA\Post(
     *     path="/room/type/create",
     *     tags={"Room Types"},
     *     summary="Create a new room type",
     *     description="Creates a new room type and stores it in the database.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", maxLength=255, description="The name of the room type.", example="Standard"),
     *             @OA\Property(property="description", type="string", description="The description of the room type."),
     *             @OA\Property(property="meta", type="object", description="Additional metadata related to the room type.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Room type created successfully",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object"),
     *         ),
     *     ),
     * )
     */

    public function store(CreateRoomTypeRequest $request, RoomTypeRepo $repo)
    {
        $data = $repo->create($request->validated());
        return (new ResourcesRoomTypeResource($data))->response()->setStatusCode(201);
    }
}
