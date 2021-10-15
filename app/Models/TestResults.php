<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    protected $table = 'resultado_teste';
    
    public $timestamps = false;

    protected $fillable = [
        'testes_id', 'sessao_id', 'percentil', 'data', 'comentario'
    ]; 
}
