<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'paciente';
    
    public $timestamps = false;

    protected $fillable = [
        'nome', 'cpf', 'data_nascimento', 'endereco', 'escolaridade', 'telefone', 'observacoes', 'cadastrado_em', 'status', 'usuario_id'
    ];
}
