<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVideos extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'embed_code',
        'video_url',
    ];
}
