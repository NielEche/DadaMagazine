<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeParallaxs extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'image_path',
    ];
}
