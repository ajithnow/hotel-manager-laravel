<?php

namespace App\Modules\Room\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
  use HasFactory, HasUuids;

  /**
   *  primaryKey
   *
   * @var string
   */
  protected $primaryKey = 'uuid';
  protected $keyType = 'string';
  public $incrementing = false;
}
