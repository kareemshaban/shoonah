<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'reference_no',
      'client_id',
      'supplier_id',
      'state',
      'date',
      'phone',
      'address',
      'notes'
    ];
}
