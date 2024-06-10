<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class featuresImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'feature_id',
        'image_path',
    ];
}
