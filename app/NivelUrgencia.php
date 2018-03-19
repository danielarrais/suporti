<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelUrgencia extends Model
{
    protected $table = "nivel_urgencia";
    protected $primaryKey = "id_nivel_urgencia";

    private $urgencia;

    /**
     * @return string
     */
    public function getId()
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
    public function getUrgencia()
    {
        return $this->urgencia = $this->attributes['urgencia'];
    }

    /**
     * @param mixed $urgencia
     */
    public function setUrgencia($urgencia)
    {
        $this->urgencia = $this->attributes['urgencia'] = $urgencia;
    }


}
