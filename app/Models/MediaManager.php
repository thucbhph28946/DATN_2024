<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaManager extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'media_file',
        'media_type',
        'media_extension',
    ];

    // Relationship với bảng Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
