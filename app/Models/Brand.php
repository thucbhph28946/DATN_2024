<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'meta_description',
        'meta_img',
        'meta_title'
    ];

    // Relationship với bảng Image (meta ảnh)
    public function metaImage()
    {
        return $this->belongsTo(Image::class, 'meta_img');
    }
}
