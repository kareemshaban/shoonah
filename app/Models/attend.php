<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attend extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'user_id',
        'attend_days_count',
        'absence_days_count',
        'user_ins',
        'user_upd'
    ];
}
