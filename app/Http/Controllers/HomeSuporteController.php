<?php

namespace App\Http\Controllers;

use App\Chamado;
use App\Usuario;
use Illuminate\Http\Request;

class HomeSuporteController extends Controller
{
    public function listaChamados(){
        $chamados = Chamado::all();
        $chamadosAbertos = Chamado::chamadosAbertos();
        $chamadosEmAtendimento = Chamado::chamadosEmAtendimento();
        $chamadosFinalizados = Chamado::chamadosFinalizados();
        return view('suporte.homeSuporte', compact('chamados', 'chamadosAbertos','chamadosFinalizados','chamadosEmAtendimento'));
    }

    public function atenderChamado($id){
        $chamado = Chamado::find($id);
        $chamado->setStatus(2);
        $chamado->setAtendente(Usuario::usuarioLogado()->getId());
        $chamado->save();
        return redirect()->route('suporte.home');
    }

    public function carregarChamado($id){
        $chamado = Chamado::find($id);
        return view('suporte.visualizarChamado', compact('chamado'));
    }
}
