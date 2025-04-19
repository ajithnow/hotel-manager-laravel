<?php

namespace App\Modules\Room\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'room_type_uuid');
    }
}
