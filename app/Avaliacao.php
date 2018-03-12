<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    //CONFIGURAÇÕES DA ENTIDADE

    //NOME DA CHAVE PRIMARIA
    protected $primaryKey = 'id_avaliacao';
    //NOME DA TABELA
    protected $table = "avaliacoes";


}
