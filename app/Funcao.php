<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    //CONFIGURAÇÕES DA ENTIDADE

    //NOME DA CHAVE PRIMARIA
    protected $primaryKey = 'id_funcao';
    //NOME DA TABELA
    protected $table = "funcao";
    public $timestamps = false;

    private $funcao;

    public function getId()
    {
        return $this->funcao = $this->attributes[$this->primaryKey];
    }

    /**
     * @param mixed $funcao
     */
    public function setId($funcao)
    {
        $this->attributes[$this->primaryKey] = $funcao;
    }

    /**
     * @return mixed
     */
    public function getFuncao()
    {
        return $this->funcao = $this->attributes['funcao'];
    }

    /**
     * @param mixed $funcao
     */
    public function setFuncao($funcao)
    {
        $this->attributes['funcao'] = $funcao;
    }
}
