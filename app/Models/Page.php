<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'meta_img',
        'meta_title',
        'image',
        'content',
    ];

    // Relationship với bảng MediaManager
    public function metaImage()
    {
        return $this->belongsTo(MediaManager::class, 'meta_img');
    }
}
