<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_chamado';

    protected $fillable = [
        'id','titulo','decricao','urgencia','hAbertura'
    ];

    public function getId()
    {
        return $this->attributes['id_chamado'];
    }

    public function setId($id)
    {
        $this->attributes['id_chamado'] = $id;
    }

    public function getTitulo()
    {
        return $this->attributes['titulo'];
    }

    public function setTitulo($titulo)
    {
        $this->attributes['titulo'] = $titulo;
    }

    public function getDescricao()
    {
        return $this->attributes['descricao'];
    }

    public function setDescricao($descricao)
    {
        $this->attributes['descricao'] = $descricao;
    }

    public function getUrgencia()
    {
        $urgencia = $this->attributes['urgencia'];
        switch ($urgencia){
            case 1:
                return  'Urgente';
            case 2:
                return  'Menos urgente';
            case 3:
                return  'Nada urgente';
        }
    }

    public function setUrgencia($urgencia)
    {
        $this->attributes['urgencia'] = $urgencia;
    }

    public function getHAbertura()
    {
        return $this->attributes['horario_abertura'];
    }

    public function setHAbertura($hAbertura)
    {
        $this->attributes['horario_abertura'] = $hAbertura;
    }

    public function getHFechamento()
    {
        return $this->attributes['horario_fechamento'];
    }

    public function setHFechamento($hFechamento)
    {
        $this->attributes['horario_fechamento'] = $hFechamento;
    }
    public function getStatus()
    {
        return $this->hasOne('App\StatusAtendimento','id_status','id_status');
    }

    public function setStatus($status)
    {
        $this->attributes['id_status'] = $status;
    }

    public function getUsuario()
    {
        return $this->hasOne('App\User');
    }

    public function setUsuario(Usuario $usuario)
    {
        $this->attributes['id_usuario'] = $usuario->getId();
    }

    public function getCategoria()
    {
        return $this->hasOne('App\Categoria');
    }

    public function setCategoria(Categoria $categoria)
    {
        $this->attributes['id_categoria'] = $categoria->getId();
    }

    public function getAtendente()
    {
        return $this->hasOne('App\Categoria');
    }

    public function setAtendente(Usuario $atendente)
    {
        $this->attributes['id_atendente'] = $atendente->getId();
    }

    public function getAvaliacao()
    {
        return $this->hasOne('App\Categoria');
    }

    public function setAvaliacao(Usuario $atendente)
    {
        $this->attributes['id_atendente'] = $atendente->getId();
    }
}
