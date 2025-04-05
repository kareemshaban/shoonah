<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'country_id',
        'city_id',
        'address',
        'phone',
        'email',
        'mobile',
        'hasAccount',
        'gender',
        'block',
        'user_ins',
        'user_upd',
        'created_at'
    ];
}
