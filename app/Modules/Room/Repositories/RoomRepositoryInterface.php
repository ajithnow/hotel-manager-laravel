<?php
namespace App\Modules\Room\Repositories;

use App\Modules\Room\Models\Room;

interface RoomRepositoryInterface{
    public function create($data) :Room;
}