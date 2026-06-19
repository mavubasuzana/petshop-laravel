<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $fillable = [
        'pet_id',
        'servico',
        'status',
        'data_atendimento',
        'observacoes'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}