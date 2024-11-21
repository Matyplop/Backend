<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


//relaciones entre diferentes entidades de datos
class Song extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'caratula',
        'genero'

    ];

    // Esto significa que cada canción pertenece a un usuario.
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
