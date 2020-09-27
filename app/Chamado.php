<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chamado extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_chamado';
    protected $table = 'chamados';

    public function getId()
    {
        return $this->attributes[$this->primaryKey];
    }

    public function setId($id)
    {
        $this->attributes[$this->primaryKey] = $id;
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

    public function getMotivoRejeicao()
    {
        return $this->attributes['motivo_rejeicao'];
    }

    public function setMotivoRejeicao($descricao)
    {
        $this->attributes['motivo_rejeicao'] = $descricao;
    }

    public function getUrgencia()
    {
        return $this->belongsTo("App\NivelUrgencia", "id_nivel_urgencia");
    }

    public function setUrgencia($urgencia)
    {
        $this->attributes['id_nivel_urgencia'] = $urgencia;
    }

    public function getPrint()
    {
        return $this->belongsTo("App\PrintTela","id_print");
    }

    public function setPrint($id)
    {
        $this->attributes['id_print'] = $id;
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
        return $this->belongsTo('App\StatusAtendimento', 'id_status');
    }

    public function setStatus($status)
    {
        $this->attributes['id_status'] = $status;
    }

    public function getUsuario()
    {
        return $this->belongsTo('App\Usuario', "id_usuario");
    }

    public function setUsuario($usuario)
    {
        $this->attributes['id_usuario'] = $usuario;
    }

    public function getAtendente()
    {
        return $this->belongsTo('App\Usuario', "id_atendente");
    }

    public function setAtendente($usuario)
    {
        $this->attributes['id_atendente'] = $usuario;
    }

    public function getCategoria()
    {
        return $this->belongsTo('App\Categoria', "id_categoria");
    }

    public function setCategoria($categoria)
    {
        $this->attributes['id_categoria'] = $categoria;
    }

    public function getAvaliacao()
    {
        return $this->belongsTo('App\Avaliacao', 'id_avaliacao');
    }

    public function setAvaliacao(Usuario $atendente)
    {
        $this->attributes['id_atendente'] = $atendente;
    }

    public static function chamadosAbertos()
    {
        return Chamado::where('id_status', '=', 1)->get();
    }

    public static function chamadosEmAtendimento()
    {
        return Chamado::where('id_status', '=', 2)->get();
    }

    public static function chamadosFinalizados()
    {
        return Chamado::where('id_status', '=', 3)->get();
    }

    public function tempoDesdeAbertura(){
        $date1 = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($this->getHAbertura()))."");
        $date2 = Carbon::createFromFormat('Y-m-d', date("Y-m-d")."");
        $value = $date2->diffInDays($date1);
        return $value;
    }
}
