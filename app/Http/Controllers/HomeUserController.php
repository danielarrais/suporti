<?php

namespace App\Http\Controllers;

use App\Chamado;
use App\Mail\EnviarCopiaDoChamado;
use App\NivelUrgencia;
use App\PrintTela;
use App\Usuario;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class HomeUserController extends Controller
{
    public function listaChamados(){
        $chamados = Usuario::usuarioLogado()->getChamados();

        return view('user.homeUser', compact('chamados'));
    }

    public function search(Request $req)
    {
        $dados = $req->all();
        $busca = $dados['busca'];
        $chamados = Chamado::join('users', 'id_usuario', '=', 'users.id')
            ->where('users.name', 'like', '%'.$busca.'%')
            ->orWhere('id_chamado', '=', $busca)
            ->orWhere('titulo', 'like', '%'.$busca.'%')
            ->orWhere('descricao', 'like', '%'.$busca.'%')
            ->orWhere('motivo_rejeicao', 'like', '%'.$busca.'%')->get();
        return view('user.homeUser', compact('chamados'));
    }

    public function index(){
        $urgencias = NivelUrgencia::all();
        return view('user.novochamado', compact('urgencias'));
    }

    public function salvar(Request $req){
        $this->validarChamado($req);
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
            $chamado->setPrint($print->getId());
        }
        $chamado->update();
        $this->enviarChamado(Chamado::find($chamado->getId()), Usuario::usuarioLogado());
        return view('user.sucessochamado');
    }
    public function formNovaSenha(){
        if (Gate::denies('alterar-senha', new Usuario())){
            abort(403, 'Sua senha já foi alterada, por favor contate o suporte caso queira solicitar uma nova senha!');
        }
        return view('user.novaSenha');
    }
    public function salvarNovaSenha(Request $req){
        if (Gate::denies('alterar-senha', new Usuario())){
            abort(403, 'Sua senha já foi alterada, por favor contate o suporte caso queira solicitar uma nova senha!');
        }
        $dados = $req->all();
        if ($dados['senha1'] == $dados['senha2']){
            $usuario = Usuario::usuarioLogado();
            $usuario->setSenha($dados['senha1']);
            $usuario->setTrocarSenha(false);
            $usuario->update();
            return redirect()->route('user.home')->with(['alterada'=>'Sua senha foi alterada com sucesso!']);
        }else{
            return redirect()->route('user.alterarsenha')->with(['erro'=>'Erro! As senha não se coincidem, tente novamente!']);
        }
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

    public function validarChamado(Request $req){
        $this->validate(
            $req,
            [
                'titulo'=>'required',
                'descricao'=>'required',
                'urgencia'=>'required',
            ],
            [
                'titulo.required'=>'Você não pode deixar o chamado sem um titulo',
                'descricao.required'=>'Você não pode deixar o chamado sem uma descrição',
                'urgencia.required'=>'Você deve selecionar o nivel de urgência do chamado',
            ]
        );
    }

    public function enviarChamado(Chamado $chamado, Usuario $usuario){
        $send = new EnviarCopiaDoChamado($chamado);
        Mail::to($usuario->getEmail())->send($send);
    }
}
