<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class featuresVideos extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'video_path',
    ];
}
