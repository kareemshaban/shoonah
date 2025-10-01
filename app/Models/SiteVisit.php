<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteVisit extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'ip_address',
      'country',
      'region',
      'city',
      'visits_count',
      'last_visit_at',
      'user_agent',
      'device_type',
    ];
}
