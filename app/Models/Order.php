<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        'user_id',
        'order_date',
        'order_status',
        'shipment_status',
        'review_id',
        'payment_method',
        'user_address',
        'coupon_discount_amount',
        'note',
    ];
}
