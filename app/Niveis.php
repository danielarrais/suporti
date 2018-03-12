<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveis extends Model
{
    //CONFIGURAÇÕES DA ENTIDADE

    //NOME DA CHAVE PRIMARIA
    protected $primaryKey = 'id_nivel';
    //NOME DA TABELA
    protected $table = "usuarios";
}
