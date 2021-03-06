<?php

namespace App\Http\Controllers;

use App\Chamado;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeSuporteController extends Controller
{
    public function listaChamados()
    {
        if (Gate::denies('visualizar-chamados', new Chamado())) {
            abort(403, 'Você não pode navegar nessas águas!');
        }
        $chamados = Chamado::orderBy('horario_abertura', 'DESC')->get();

        $chamadosMeus = Chamado::where('id_atendente', '=', Usuario::usuarioLogado()->getId())->orderBy('horario_abertura', 'DESC')->get();
        return view('suporte.homeSuporte', compact('chamados', 'chamadosMeus'));
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
            ->orWhere('motivo_rejeicao', 'like', '%'.$busca.'%')->orderBy('horario_abertura', 'DESC')->get();
        $chamadosMeus = Chamado::join('users', 'id_usuario', '=', 'users.id')
            ->where('id_atendente', '=', Usuario::usuarioLogado()->getId())
            ->orWhere('users.name', 'like', '%'.$busca.'%')
            ->orWhere('id_chamado', '=', $busca)
            ->orWhere('titulo', 'like', '%'.$busca.'%')
            ->orWhere('descricao', 'like', '%'.$busca.'%')
            ->orWhere('motivo_rejeicao', 'like', '%'.$busca.'%')->orderBy('horario_abertura', 'DESC')->get();
        return view('suporte.homeSuporte', compact('chamados', 'chamadosMeus'));
    }

    public function formRejeicao($id)
    {
        $chamado = Chamado::find($id);
        return view('suporte.rejeitarChamado', compact('chamado'));
    }

    public function atenderChamado($id)
    {
        $chamado = Chamado::find($id);

        if (Gate::denies('pegar-chamado', $chamado)) {
            abort(403, 'Você não pode atender esse chamado!');
        }

        $chamado->setStatus(2);
        $chamado->setAtendente(Usuario::usuarioLogado()->getId());
        $chamado->update();

        return redirect()->route('suporte.home');
    }

    public function finalizarChamado($id)
    {
        $chamado = Chamado::find($id);

        if (Gate::denies('finalizar-chamado', $chamado)) {
            abort(403, 'Você não pode finalizar esse chamado!');
        }

        $chamado->setStatus(3);
        $chamado->update();

        return redirect()->route('suporte.home');
    }

    public function rejeitarChamado(Request $req)
    {
        $motivo = $req['motivo'];
        $id = $req['id'];
        $chamado = Chamado::find($id);

        if (Gate::denies('rejeitar-chamado', $chamado)) {
            abort(403, 'Você não pode rejeitar esse chamado!');
        }
        if ($motivo != '') {
            $chamado->setStatus(4);
            $chamado->setMotivoRejeicao($motivo);
            $chamado->update();
            return redirect()->route('suporte.home');
        }
    }

    public function carregarChamado($id)
    {
        $chamado = Chamado::find($id);
        return view('suporte.visualizarChamado', compact('chamado'));
    }
}
