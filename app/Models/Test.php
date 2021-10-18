<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'testes';
    
    public $timestamps = false;

    protected $fillable = [
        'nome', 'descricao', 'cadastrado_em'
    ];

    public function schedules()
    {
        return $this->belongsToMany('App\Models\Schedule','resultado_teste', 'teste_id', 'sessao_id')->withPivot('data', 'percentil', 'comentario');
    }
}
