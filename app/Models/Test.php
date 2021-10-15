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

    public function testsResultsTest()
    {
        return $this->belongsToMany(Schedule::class, 'resultado_teste', 'sessao_id', 'testes_id');
    }
    
}
