<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'sessao';
    
    public $timestamps = false;

    protected $fillable = [
        'usuario_id', 'paciente_id', 'data_hora', 'anotacoes', 'conclusoes'
    ];
}
