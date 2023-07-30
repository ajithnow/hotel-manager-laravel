<?php

namespace App\Modules\Room\Repositories;

use App\Modules\Room\Models\RoomType;

interface RoomTypeRepositoryInterface{
    public function create($data):RoomType;
}