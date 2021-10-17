<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class User extends Model
{
    protected $table = 'usuario';
    
    public $timestamps = false;

    protected $fillable = [
        'nome', 'email', 'senha', 'codigo_usuario', 'tipo_conselho', 'numero_conselho', 'cadastrado_em'
    ];  
}
