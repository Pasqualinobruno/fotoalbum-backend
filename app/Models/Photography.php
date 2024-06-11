<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'upload_image',
        'evidence',
        'city'
    ];
}
