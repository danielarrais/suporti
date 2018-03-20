<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintTela extends Model
{
    protected $table = "prints";
    protected $primaryKey = "id_print";
    public $timestamps = false;

    private $url;
    private $nome;

    public function getId()
    {
        return $this->attributes[$this->primaryKey];
    }

    public function setId($id)
    {
        $this->attributes[$this->primaryKey] = $id;
    }

    public function getUrl()
    {
        return $this->url = $this->attributes['url'];
    }

    public function setUrl($url)
    {
        $this->url = $this->attributes['url'] = $url;
    }

    public function getNome()
    {
        return $this->url = $this->attributes['nome'];
    }

    public function setNome($nome)
    {
        $this->url = $this->attributes['nome'] = $nome;
    }

    public function chamado(){
        return $this->hasOne("App\Chamado", "id_print");
    }
}
