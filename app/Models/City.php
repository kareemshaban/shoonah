<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'country_id',
        'name_ar',
        'name_en',
        'user_ins',
        'user_upd'
    ];
}
