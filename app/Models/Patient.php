<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'paciente';
    
    public $timestamps = false;

    protected $fillable = [
        'nome', 'cpf', 'endereco', 'observacoes', 'cadastrado_em', 'status'
    ];
}
