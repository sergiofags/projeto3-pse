<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExperienciaComplementar extends Model
{
    protected $table = 'experiencia_complementar';

    protected $fillable = [
        'id_pessoa',
        'tipo_experiencia',
        'titulo',
        'descricao',
        'nivel_idioma',
        'certificado',
        'data_inicio',
        'data_fim',
        'instituicao',
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }
}