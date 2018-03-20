<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    public static $MASTER = "MASTER";
    public static $SUPORTE = "SUPORTE";
    public static $USER = "USER";

    //NOME DA CHAVE PRIMARIA
    protected $primaryKey = 'id_nivel';
    //NOME DA TABELA
    protected $table = "niveis";
    private $nivel;

    public function getId()
    {
        return $this->attributes[$this->primaryKey];
    }

    public function setId($id)
    {
        $this->attributes[$this->primaryKey] = $id;
    }

    public function getNivel()
    {
        return $this->nivel = $this->attributes['nivel'];
    }

    public function setNivel($nivel)
    {
        $this->nivel = $this->attributes['nivel'] = $nivel;
    }

    public function usuarios(){
        return $this->hasOne("App\Usuario", "id_nivel");
    }
}
