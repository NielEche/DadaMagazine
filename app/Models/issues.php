<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issues extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'published',
        'featuring',
        'image_path',
    ];
}
