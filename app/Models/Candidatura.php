<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidatura extends Model
{
    protected $table = 'candidaturas';

    protected $fillable = [
        'id_pessoa',
        'id_vaga',
        'status',
        'data_candidatura',
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }

    public function vaga(): BelongsTo
    {
        return $this->belongsTo(Vaga::class, 'id_vaga');
    }
}