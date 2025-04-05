<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProducts extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'supplier_id',
      'product_id',
      'price',
      'quantity',
      'discount',
      'finalPrice',
        'user_ins',
        'user_upd'
    ];
}
