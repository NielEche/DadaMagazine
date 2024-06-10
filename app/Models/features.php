<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'credit',
        'caption',
        'content',
        'image_path',
        'tags',
    ];
}
