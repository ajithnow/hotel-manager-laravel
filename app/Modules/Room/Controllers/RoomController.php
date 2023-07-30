<?php

namespace App\Modules\Room\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Room\Requests\CreateRoomRequest;
use App\Modules\Room\Resources\RoomResource;
use App\Modules\Room\Repositories\RoomRepositoryInterface as RoomRepo;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(CreateRoomRequest $request, RoomRepo $repo){
        $data = $repo->create($request);
        return (new RoomResource($data))->response()->setStatusCode(200);
    }
}
