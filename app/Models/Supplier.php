<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'company',
        'logo',
        'country_id',
        'city_id',
        'address',
        'phone',
        'email',
        'mobile',
        'vatNumber',
        'registrationNumber',
        'type',
        'hasAccount',
        'block',
        'user_ins',
        'user_upd'

    ];
}
