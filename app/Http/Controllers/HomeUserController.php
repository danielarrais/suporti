<?php

namespace App\Http\Controllers;

use App\Chamado;
use App\PrintTela;
use App\Usuario;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

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
        $print = null;
        $chamado = new Chamado();
        $chamado->setTitulo($req['titulo']);
        $chamado->setDescricao($req['descricao']);
        $chamado->setHAbertura(date("Y-m-d H:i:s"));
        $chamado->setUrgencia($req['urgencia']);
        $chamado->setUsuario(Usuario::usuarioLogado()->getId());
        $chamado->save();
        if ($req->hasFile('imagem')) {
            $print = $this->uploadPrint($req->file('imagem'), $chamado);

        }
        $chamado->setPrint($print->getId());
        $chamado->update();
        return view('user.sucessochamado');
    }

    public function cancelarChamado($id){
        $chamado = Chamado::find($id);
        if (Gate::denies('finalizar-chamado', $chamado)){
            abort(403, 'Você não pode cancelar este chamado!');
        }
        $chamado->delete();
        return redirect()->route('user.home');
    }

    public function finalizarChamado($id){
        $chamado = Chamado::find($id);

        if (Gate::denies('finalizar-chamado', $chamado)){
            abort(403, 'Você não pode finalizar esse chamado!');
        }

        $chamado->setStatus(3);
        $chamado->update();

        return redirect()->route('suporte.home');
    }

    public function carregarChamado($id){
        $chamado = Chamado::find($id);
        return view('suporte.visualizarChamado', compact('chamado'));
    }

    public function rejeitarChamado($id)
    {
        $chamado = Chamado::find($id);

        if (Gate::denies('rejeitar-chamado', $chamado)){
            abort(403, 'Você não pode rejeitar esse chamado!');
        }

        $chamado->setStatus(4);
        $chamado->save();
        return redirect()->route('suporte.home');
    }

    public function uploadPrint($print, Chamado $chamado): PrintTela
    {
        $printTela = new PrintTela();
        $imagem = $print;
        $diretorio = "img/prints/";
        $extensao = $imagem->clientExtension();
        $nome = "chamado_" . $chamado->getId() . "__user_" . $chamado->getUsuario->getId() . "." . $extensao;
        $imagem->move($diretorio, $nome);
        $url = $diretorio . $nome;

        $printTela->setUrl($url);
        $printTela->setNome($nome);
        $printTela->save();
        return $printTela;
    }
}
