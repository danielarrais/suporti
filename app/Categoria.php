<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    private $categorias;
    public function chamados(){
        return $this->hasOne('App\Categoria', "id_categoria");
    }

    /**
     * @return mixed
     */
    public function getCategorias()
    {
        return $this->categorias = $this->attributes['categoria'];
    }

    /**
     * @param mixed $categoris
     */
    public function setCategorias($categorias)
    {
        $this->categorias = $this->attributes['categoria'] = $categorias;
    }

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
    public function setId(string $primaryKey)
    {
        $this->attributes[$this->primaryKey] = $primaryKey;
    }


}
