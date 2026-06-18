<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'idade',
        'tutor',
        'imagem'
    ];

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }
}