<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompositionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'composition_id',
      'material_id',
      'quantity',
      'cost',
    ];
}
