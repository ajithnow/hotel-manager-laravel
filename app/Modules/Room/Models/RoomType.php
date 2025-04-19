<?php

namespace App\Modules\Room\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';
    public $incrementing = false;
}
