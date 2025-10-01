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
        'image',
      'user_ins',
      'user_upd',
        'children'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'department_id');
    }
}
