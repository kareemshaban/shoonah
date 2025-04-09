<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'code',
      'name_ar',
      'name_en',
      'department_id',
      'category_id',
      'cost',
      'additional_cost',
      'total_cost',
      'formula_equation',
      'description_ar',
      'description_en',
        'notes',
        'file',
        'user_ins',
        'user_upd'
    ];
}
