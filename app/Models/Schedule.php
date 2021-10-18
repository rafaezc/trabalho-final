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

    public function tests()
    {
        return $this->belongsToMany('App\Models\Test','resultado_teste', 'teste_id', 'sessao_id')->withPivot('data', 'percentil', 'comentario');
    }
}
