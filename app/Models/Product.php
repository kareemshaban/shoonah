<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'brand_id',
      'department_id',
      'category_id',
      'code',
      'name_ar',
      'name_en',
      'description_ar',
      'description_en',
      'short_description_ar',
      'short_description_en',
      'tag',
      'isPrivate',
      'isAvailable',
      'type',
      'mainImg',
      'img1',
      'img2',
      'img3',
      'img4',
       'user_ins',
       'user_upd'
    ];
}
