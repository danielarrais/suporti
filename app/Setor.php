<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    //CONFIGURAÇÕES DA ENTIDADE

    //NOME DA CHAVE PRIMÁRIA
    protected $primaryKey = 'id_usuario';
    //NOME DA TABELA
    protected $table = "users";
}
