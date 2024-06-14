<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'upload_album'];

    public function photographies(): BelongsToMany
    {
        return $this->belongsToMany(Photography::class);
    }
}
