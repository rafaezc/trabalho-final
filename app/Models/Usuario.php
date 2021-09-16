<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    
    public $timestamps = false;

    protected $fillable = [
        'nome', 'email', 'senha', 'codigo_usuario', 'recuperar_senha', 'tipo_conselho', 'cadastrado_em'
    ];
    
}
