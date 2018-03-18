<?php

namespace App\Http\Controllers;

use App\Chamado;
use App\Usuario;
use Illuminate\Http\Request;
use Auth;

class HomeUserController extends Controller
{
    public function listaChamados(){
        $chamados = Usuario::usuarioLogado()->getChamados();
        return view('user.homeUser', compact('chamados'));
    }

    public function index(){
        return view('user.novochamado');
    }

    public function salvar(Request $req){
        $chamado = new Chamado();
        $chamado->setTitulo($req['titulo']);
        $chamado->setDescricao($req['descricao']);
        $chamado->setHAbertura(date("Y-m-d H:i:s"));
        $chamado->setUrgencia($req['urgencia']);
        $chamado->setUsuario(Usuario::usuarioLogado()->getId());
        $chamado->save();
        return view('user.sucessochamado');
    }

    public function excluirChamado($id){
        Chamado::find($id)->delete();
        return redirect()->route('user.home');
    }

    public function finalizarChamado($id){
        $chamado = Chamado::find($id);
        $chamado->setStatus(3);
        $chamado->save();
        return redirect()->route('suporte.home');
    }

    public function carregarChamado($id){
        $chamado = Chamado::find($id);
        return view('suporte.visualizarChamado', compact($chamado));
    }
}
