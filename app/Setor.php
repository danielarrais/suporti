<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    //CONFIGURAÇÕES DA ENTIDADE

    //NOME DA CHAVE PRIMÁRIA
    protected $primaryKey = 'id_setor';
    //NOME DA TABELA
    protected $table = "setores";
    public $timestamps = false;

    private $setor;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->attributes[$this->primaryKey];
    }

    /**
     * @param string $primaryKey
     */
    public function setId($primaryKey)
    {
        $this->attributes[$this->primaryKey] = $primaryKey;
    }

    /**
     * @return mixed
     */
    public function getSetor()
    {
        return $this->setor = $this->attributes['setor'];
    }

    /**
     * @param mixed $setor
     */
    public function setSetor($setor)
    {
        $this->setor = $this->attributes['setor']= $setor;
    }


}
