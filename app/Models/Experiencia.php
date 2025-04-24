<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experiencia extends Model
{
    protected $table = 'experiencia';

    protected $fillable = [
        'id_pessoa',
        'tipo_experiencia',
        'status',
        'empresa_instituicao',
        'curso_cargo',
        'nivel',
        'atividades',
        'semestre_modulo',
        'data_inicio',
        'data_fim',
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }
}