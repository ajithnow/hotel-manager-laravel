<?php

namespace App\Modules\Room\Repositories;

use App\Modules\Room\Models\Room;
use App\Modules\Room\Repositories\RoomRepositoryInterface;

class RoomRepository implements RoomRepositoryInterface{
    public function create($data): Room
    {
        return Room::create($data);
    }
}