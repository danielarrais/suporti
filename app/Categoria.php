<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function chamados(){
        return $this->hasOne('App\Categoria', "id_categoria");
    }
}
