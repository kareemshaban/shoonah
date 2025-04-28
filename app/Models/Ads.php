<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'banner',
      'type',
      'order',
      'url',
      'item_id',
      'isVisible',
        'duration',
        'user_ins',
        'user_upd'
    ];
}
