<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Photography extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'upload_image',
        'evidence',
        'city',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Albums::class);
    }
}
