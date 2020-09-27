<?php

namespace App\Http\Controllers;

use App\Funcao;
use App\Mail\EnviarNovaSenha;
use App\Nivel;
use App\Setor;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class UsuariosAdminController extends Controller
{
    public function index(){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode navegar nessas águas!');
        }
        $usuarios = Usuario::all();
        return view('admin.listaUsuario', compact('usuarios'));
    }

    public function usuarios(){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode navegar nessas águas!');
        }
        return view('admin.listaUsuario');
    }

    public function editarUsuario( $acao, $id){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode editar usuários!');
        }
        $usuario = Usuario::find($id);
        $setores = Setor::all();
        $niveis = Nivel::all();
        $funcoes = Funcao::all();
        return view('admin.editarUsuario', compact('usuario', 'setores', 'niveis', 'funcoes', 'acao'));
    }

    public function novoUsuario($acao){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode criar usuários!');
        }
        $setores = Setor::all();
        $niveis = Nivel::all();
        $funcoes = Funcao::all();
        return view('admin.novoUsuario', compact('acao', 'setores', 'niveis', 'funcoes'));
    }

    public function excluirUsuario(Request $req){
        $dados = $req->all();
        $usuario = Usuario::find($dados['id']);
        if (Gate::denies('master', $usuario)){
            abort(403, 'Você não pode excluir contas de usuários!');
        }
        if (Gate::denies('ativar-excluir-usuario', $usuario)){
            abort(403, 'Você não pode excluir ou desativar a sua própria conta!');
        }
        $usuario->delete();
        return redirect()->route('admin.usuarios');
    }

    public function atualizarUsuario(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode modificar usuários!');
        }
        $this->validarUsuario($req);
        $dados = $req->all();
        $usuario = Usuario::find($dados['id']);
        $usuario->setId($dados['id']);
        $usuario->setEmail($dados['email']);
        $usuario->setNome($dados['nome']);
        $usuario->setSobrenome($dados['sobrenome']);
        $usuario->setFuncao($dados['funcao']);
        $usuario->setNivel($dados['nivel']);
        $usuario->setSetor($dados['setor']);
        $usuario->setFuncao($dados['funcao']);
        $usuario->update();
        return redirect()->route('admin.home');
    }

    public function criarUsuario(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode cadastrar usuários!');
        }
        $this->validarUsuario($req);
        $dados = $req->all();
        $usuario = new Usuario();
        $usuario->setEmail($dados['email']);
        $usuario->setNome($dados['nome']);
        $usuario->setSobrenome($dados['sobrenome']);
        $usuario->setFuncao($dados['funcao']);
        $usuario->setNivel($dados['nivel']);
        $usuario->setSetor($dados['setor']);
        $usuario->setSenha('123456');
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }

    public function ativarOuDesativarUsuario($id){
        if (Gate::denies('ativar-excluir-usuario', new Usuario())){
            abort(403, 'Você não pode ativar ou desativar a conta deste usuário!');
        }
        $usuario = Usuario::find($id);
        $usuario->setAtivo($usuario->isAtivo()?false:true);
        $usuario->update();
        return redirect()->route('admin.usuarios');
    }

    public function gerarSenha(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode resetar senha dos usuários!');
        }
        $novasenha = random_int(111111, 999999);
        $dados = $req->all();
        $usuario = Usuario::find($dados['id']);
        $usuario->setSenha($novasenha);
        $usuario->setTrocarSenha(true);
        $usuario->update();
        $this->enviarSenha($novasenha, $usuario);
        return redirect()->route('admin.usuarios')->with(['iduser'=>$dados['id'],'message'=>'Senha foi gerada com sucesso e enviada com sucesso para o email '.$usuario->getEmail(), 'novasenha'=>$novasenha]);
    }

    public function enviarSenha($novaSenha, Usuario $usuario){
        $send = new EnviarNovaSenha($novaSenha);
        Mail::to($usuario->getEmail())->send($send);
    }

    public function validarUsuario(Request $req){
        $this->validate(
            $req,
            [
                'nome'=>'required',
                'funcao'=>'required',
                'nivel'=>'required',
                'setor'=>'required',
                'email'=>'email|required|unique:users',
                'sobrenome'=>'required'
            ],
            [
                'nome.required'=>'Você não pode deixar o campo nome vazio',
                'funcao.required'=>'Você deve informar a função do usuário',
                'nivel.required'=>'Você deve informar a nivel de acesso do usuário',
                'setor.required'=>'Você deve informar o setor do usuário',
                'email.required'=>'Você não pode deixar o campo email vazio',
                'email.email'=>'O email informado não é válido',
                'email.unique'=>'O email informado já é utilizado em outra conta',
                'sobrenome.required'=>'Você não pode deixar o campo sobrenome vazio'
            ]
        );
    }
}
