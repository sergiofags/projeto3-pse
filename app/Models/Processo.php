<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Processo extends Model
{
    protected $table = 'processos';

    protected $fillable = [
        'id_vaga',
        'id_candidatura',
        'status',
        'data_inicio',
        'data_fim',
        'numero_processo',
        'edital',
    ];

    public function vaga(): BelongsTo
    {
        return $this->belongsTo(Vaga::class, 'id_vaga');
    }

    public function candidatura(): BelongsTo
    {
        return $this->belongsTo(Candidatura::class, 'id_candidatura');
    }
}