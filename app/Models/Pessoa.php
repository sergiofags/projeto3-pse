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
        'profile_photo',
        'about',
        'linkedin_profile',
        'cpf',
        'birthDate',
        'gender',
        'deficiency',
        'militar_service',
        'phone',
        'street_addres',
        'neighborhood',
        'city',
        'state',
        'house_number',
        'complement',
        'cep',
        'reference'
    ];

    // BelongsTo = pertence a um registro de outra tabela
    // HasMany = tem muitos registros de outra tabela

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function candidacies(): HasMany
    {
        return $this->hasMany(Candidacy::class, 'id_person');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'id_person');
    }

    public function complementaryExperiences(): HasMany
    {
        return $this->hasMany(ComplementaryExperience::class, 'id_person');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'id_person');
    }

    public function hirings(): HasMany
    {
        return $this->hasMany(Hiring::class, 'id_person');
    }
}