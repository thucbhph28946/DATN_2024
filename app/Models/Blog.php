<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'thumbnail_image',
        'author',
        'is_active',
        'is_popular',
        'meta_description',
        'meta_img',
        'meta_title'
    ];

    // Relationship với bảng Image (ảnh đại diện và meta ảnh)
    public function thumbnailImage()
    {
        return $this->belongsTo(Image::class, 'thumbnail_image');
    }

    public function metaImage()
    {
        return $this->belongsTo(Image::class, 'meta_img');
    }

    // Relationship với bảng User (người đăng)
    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
