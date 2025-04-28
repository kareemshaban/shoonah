<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'name_ar',
      'name_en',
        'prefix',
      'user_ins',
      'user_upd'
    ];
}
