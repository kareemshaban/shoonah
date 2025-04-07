<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'name_ar',
      'name_en',
      'description_ar',
      'description_en',
      'unit_id', // 0 ml 1 gm
      'priceOfHundred',
      'user_ins',
      'user_upd'
    ];
}
