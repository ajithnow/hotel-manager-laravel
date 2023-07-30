<?php

namespace App\Modules\Room\Repositories;

use App\Modules\Room\Models\RoomType;
use App\Modules\Room\Repositories\RoomTypeRepositoryInterface;

class RoomTypeRepository implements RoomTypeRepositoryInterface{
    public function create($data) :RoomType{
        return RoomType::create($data);
    }
}