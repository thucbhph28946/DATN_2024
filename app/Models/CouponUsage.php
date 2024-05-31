<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUsage extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_code',
        'user_id',
        'usage_count',
    ];
}
