<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'caratula',
        'genero'

    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
