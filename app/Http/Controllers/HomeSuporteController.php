<?php

namespace App\Http\Controllers;

use App\Chamado;
use Illuminate\Http\Request;

class HomeSuporteController extends Controller
{
    public function listaChamados(){
        $chamados = Chamado::all();
        return view('suporte.homeSuporte', compact('chamados'));
    }

    public function atenderChamado($id){
        $chamado = Chamado::find($id);
        $chamado->setStatus(2);
        $chamado->save();
        return redirect()->route('suporte.home');
    }
}
