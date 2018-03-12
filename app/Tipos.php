<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    //CONFIGURAÇÕES DA ENTIDADE

    //NOME DA CHAVE PRIMARIA
    protected $primaryKey = 'id_usuario';
    //NOME DA TABELA
    protected $table = "usuarios";
}
