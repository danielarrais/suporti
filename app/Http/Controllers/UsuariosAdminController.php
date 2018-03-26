<?php

namespace App\Http\Controllers;

use App\Funcao;
use App\Nivel;
use App\Setor;
use App\Usuario;
use Illuminate\Http\Request;

class UsuariosAdminController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        return view('admin.listaUsuario', compact('usuarios'));
    }

    public function usuarios(){

        return view('admin.listaUsuario');
    }

    public function editarUsuario($id){
        $usuario = Usuario::find($id);
        $setores = Setor::all();
        $niveis = Nivel::all();
        $funcoes = Funcao::all();
        return view('admin.editarUsuario', compact('usuario', 'setores', 'niveis', 'funcoes'));
    }

    public function salvarUsuario(Request $req){

    }
}
