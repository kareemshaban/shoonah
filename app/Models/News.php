<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'publisher',
        'date',
        'mainImg',
        'details_ar',
        'details_en',
        'img1',
        'img2',
        'img3',
        'isVisible',
        'user_ins',
        'user_upd'
    ];
}
