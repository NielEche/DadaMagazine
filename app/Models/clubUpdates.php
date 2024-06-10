<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clubUpdates extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_path',
        'link',
        'text',
    ];
}
