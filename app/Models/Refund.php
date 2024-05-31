<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'order_payment_status',
        'refund_reason',
        'refund_reject_reason',
        'refund_status',
    ];
}
