<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariationValue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'variation_id',
        'name',
        'is_active',
        'image',
        'color_code',
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
