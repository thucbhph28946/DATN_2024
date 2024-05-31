<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'added_by',
        'name',
        'slug',
        'brand_id',
        'thumbnail_image',
        'list_image',
        'short_description',
        'description',
        'price',
        'price_before',
        'stock_qty',
        'is_published',
        'is_featured',
        'has_variation',
        'meta_description',
        'meta_img',
        'meta_title',
    ];

    // Relationship với bảng Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relationship với bảng MediaManager (thumbnail_image)
    public function thumbnailImage()
    {
        return $this->belongsTo(MediaManager::class, 'thumbnail_image');
    }

    // Relationship với bảng MediaManager (meta_img)
    public function metaImage()
    {
        return $this->belongsTo(MediaManager::class, 'meta_img');
    }
}
