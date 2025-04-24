<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contratacao extends Model
{
    protected $table = 'contratacao';

    protected $fillable = [
        'id_vaga',
        'id_pessoa',
        'id_candidatura',
        'id_classificacao',
        'data_contratacao',
        'data_exame',
        'professor_orientador',
        'registro_academico',
        'numero_contrato',
        'apolice_seguro',
    ];

    public function vaga(): BelongsTo
    {
        return $this->belongsTo(Vaga::class, 'id_vaga');
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }

    public function candidatura(): BelongsTo
    {
        return $this->belongsTo(Candidatura::class, 'id_candidatura');
    }

    public function classificacao(): BelongsTo
    {
        return $this->belongsTo(Classificacao::class, 'id_classificacao');
    }
}