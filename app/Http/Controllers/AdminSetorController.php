<?php

namespace App\Http\Controllers;

use App\Setor;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminSetorController extends Controller
{
    public function index(){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode navegar nessas águas!');
        }
        $setores = Setor::all();
        return view('admin.listaCriaSetores', compact('setores'));
    }

    public function editarSetor($id){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode modificar setores!');
        }
        $setores = Setor::all();
        $setor = Setor::find($id);
        return view('admin.listarCriarFuncoes', compact('setores','setor'));
    }

    public function salvarSetor(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode adicionar setores!');
        }
        $dados = $req->all();

        if ($dados['id']!=''){
            $setor = Setor::find($dados['id']);
            $setor->setSetor($dados['setor']);
            $setor->update();
        }else{
            $setor = new Setor();
            $setor->setSetor($dados['setor']);
            $setor->save();
        }
        return redirect()->route('admin.setores')->with(['sucesso'=>'Setor editada com sucesso!']);
    }
    public function excluirSetor(Request $req){
        if (Gate::denies('master', new Usuario())){
            abort(403, 'Você não pode excluir setores!');
        }
        $dados = $req->all();

        if ($dados['id']!=''){
            $setor = Setor::find($dados['id']);
            $setor->delete();
        }
        return redirect()->route('admin.setores')->with(['sucesso'=>'Setor excluida com sucesso!']);
    }
}
