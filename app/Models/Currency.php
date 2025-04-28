<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'name_ar',
       'name_en',
       'symbol',
       'isDefault',
        'rate',
        'user_ins',
        'user_upd'

    ];
}
