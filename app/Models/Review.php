<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'client_id',
      'supplier_id',
      'review',
      'comment',
        'created_at'
    ];
}
