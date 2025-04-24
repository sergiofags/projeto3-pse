<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaga extends Model
{
    protected $table = 'vagas';

    protected $fillable = [
        'titulo',
        'responsabilidades',
        'requisitos',
        'carga_horaria',
        'remuneracao',
        'beneficios',
        'quantidade',
        'data_inicio',
        'data_fim',
        'tipo_vaga',
    ];

    public function candidatura(): HasMany
    {
        return $this->hasMany(Candidatura::class, 'id_vaga');
    }
}