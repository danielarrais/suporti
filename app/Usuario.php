<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Usuario extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'senha',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'users';

    private $id;
    private $sobrenome;
    private $nome;
    private $senha;
    private $email;
    private $funcao;
    private $setor;
    private $nivel;

    /**
     * @return mixed
     */
    public function getId():int
    {
        return $this->id = $this->attributes[$this->primaryKey];
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->attributes[$this->primaryKey]= $id;
    }

    /**
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome = $this->attributes['sobrenome'];
    }

    /**
     * @param mixed $sobrenome
     */
    public function setSobrenome($sobrenome)
    {
        $this->attributes['sobrenome']= $sobrenome;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome = $this->attributes['name'];
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->attributes['name']= $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email = $this->attributes['email'];
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email =  $this->attributes['email'] = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha = $this->attributes['password'];
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->attributes['password'] = $senha;
    }

    /**
     * @return mixed
     */
    public function getFuncao()
    {
        return $this->belongsTo('App\Funcao',"id_funcao");
    }

    /**
     * @param mixed $funcao
     */
    public function setFuncao($funcao)
    {
        $this->attributes['id_funcao']= $funcao;
    }

    /**
     * @return mixed
     */
    public function getSetor()
    {
        return $this->belongsTo('App\Setor',"id_setor");
    }

    /**
     * @param mixed $setor
     */
    public function setSetor($setor)
    {
        $this->attributes['id_setor']=$setor;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->belongsTo("App\Nivel", "id_nivel");
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $this->attributes['id_nivel']=$nivel;
    }

    public function getChamados()
    {
        return $this->hasMany('App\Chamado', "id_usuario", "id")->getResults();
    }

    public function getChamadosAtendidos(){
        return $this->hasOne('App\Usuario', "id_atendente");
    }

    public static function usuarioLogado():Usuario{
        return Auth::user();
    }
}
