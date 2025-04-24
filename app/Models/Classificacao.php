<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classificacao extends Model
{
    protected $table = 'classificacao';

    protected $fillable = [
        'id_candidatura',
        'nota_coeficiente_rendimento',
        'nota_entrevista',
        'situacao',
        'motivo_situacao'
    ];

    public function candidatura(): BelongsTo
    {
        return $this->belongsTo(Candidatura::class, 'id_candidatura');
    }
}