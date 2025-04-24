<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrevista extends Model
{
    protected $table = 'entrevista';

    protected $fillable = [
        'id_candidatura',
        'data_hora',
        'status',
        'localizacao',
    ];

    public function candidatura(): BelongsTo
    {
        return $this->belongsTo(Candidatura::class, 'id_candidatura');
    }
}