<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'request_id',
      'ref_no',
      'supplier_id',
      'client_id',
      'date',
      'total',
      'discount',
      'net',
      'notes',
      'state',
      'details',
    ];
}
