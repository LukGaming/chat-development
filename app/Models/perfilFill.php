<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perfilFill extends Model
{
    use HasFactory;
    protected $fillable = [
        "nome",
        "descricao_perfil",
        "caminho_imagem_perfil"
    ];
   
}
