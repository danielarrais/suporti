<?php

namespace App\Http\Controllers;

use App\Funcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminFuncaoController extends Controller
{
    public function index(){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode navegar nessas águas!');
        }
        $funcoes = Funcao::all();
        return view('admin.listarCriarFuncoes', compact('funcoes'));
    }

    public function editarFuncao($id){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode modificar cargos!');
        }
        $funcoes = Funcao::all();
        $funcao = Funcao::find($id);
        return view('admin.listarCriarFuncoes', compact('funcoes','funcao'));
    }

    public function salvarFuncao(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode adicionar cargos!');
        }
        $dados = $req->all();

        if ($dados['id']!=''){
            $funcao = Funcao::find($dados['id']);
            $funcao->setFuncao($dados['funcao']);
            $funcao->update();
        }else{
            $funcao = new Funcao();
            $funcao->setFuncao($dados['funcao']);
            $funcao->save();
        }
        return redirect()->route('admin.funcoes')->with(['sucesso'=>'Funcao editada com sucesso!']);
    }
    public function excluirFuncao(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode excluir cargos!');
        }
        $dados = $req->all();

        if ($dados['id']!=''){
            $funcao = Funcao::find($dados['id']);
            $funcao->delete();
        }
        return redirect()->route('admin.funcoes')->with(['sucesso'=>'Funcao excluida com sucesso!']);
    }
}
