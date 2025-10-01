<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'department_id',
        'name_ar',
        'name_en',
        'prefix' ,
        'icon',
        'user_ins',
        'user_upd'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

}
