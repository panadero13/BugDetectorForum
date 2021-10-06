<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'user_id',
        'instancia_id',
    ];

    /**
     * Get the instancia that owns the Comentario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instancia(): BelongsTo
    {
        return $this->belongsTo(Instancia::class, 'foreign_key', 'other_key');
    }
}
