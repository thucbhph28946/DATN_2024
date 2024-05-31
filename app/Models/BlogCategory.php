<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
        'slug',
        'meta_description',
        'meta_img',
        'meta_title'
    ];
    protected $dates = ['deleted_at'];
}
