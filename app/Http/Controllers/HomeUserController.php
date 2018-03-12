<?php

namespace App\Http\Controllers;

use App\Chamado;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function listaChamados(){
        $chamados = Chamado::all();
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
}
