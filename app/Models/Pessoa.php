<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pessoa extends Model
{
    protected $table = 'pessoas';

    protected $fillable = [
        'id_user',
        'nome',
        'foto_perfil',
        'sobre',
        'linkedin',
        'cpf',
        'data_nascimento',
        'genero',
        'deficiencia',
        'servico_militar',
        'telefone',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'numero',
        'complemento',
        'cep',
        'referencia'
    ];

    // BelongsTo = pertence a um registro de outra tabela
    // HasMany = tem muitos registros de outra tabela

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function candidatura(): HasMany
    {
        return $this->hasMany(Candidatura::class, 'id_pessoa');
    }

    public function experiencia(): HasMany
    {
        return $this->hasMany(Experiencia::class, 'id_pessoa');
    }

    public function experienciaComplementar(): HasMany
    {
        return $this->hasMany(ExperienciaComplementar::class, 'id_pessoa');
    }

    public function documento(): HasMany
    {
        return $this->hasMany(Documento::class, 'id_pessoa');
    }

    public function contratacao(): HasMany
    {
        return $this->hasMany(Contratacao::class, 'id_pessoa');
    }
}