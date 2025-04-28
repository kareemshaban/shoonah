<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'role_id',
        'form_id',
        'form_name',
        'access_level' , // 0 no access 1 full access 2 view access
        'user_ins',
        'user_upd'
    ];
}
