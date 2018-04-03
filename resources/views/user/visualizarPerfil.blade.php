@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <br/>
    <div class="row container">
        <div class="card no-shadow no-border">
            <div class="card-content no-padding-bot text-darken-4">
                <span class="card-title"> <b>{{$perfil->getNome()}} {{$perfil->getSobreNome()}}</b></span>
                <div class="row">
                    <div class="col s3 m3">
                        <label for="status{{$perfil ->getId()}}">Setor:</label>
                        <p id="status{{$perfil -> getId()}}">{{$perfil->getSetor->getSetor()}}</p>
                    </div>
                    <div class="col s3 m3">
                        <label for="status{{$perfil -> getId()}}">Função:</label>
                        <p id="status{{$perfil -> getId()}}">{{$perfil->getFuncao->getFuncao()}}</p>
                    </div>
                    <div class="col s3 m3">
                        <label for="status{{$perfil -> getId()}}">Email:</label>
                        <p id="status{{$perfil -> getId()}}">{{$perfil->getEmail()}}</p>
                    </div>
                </div>
                <div>

                    <div class="card-action">
                        @can('master', new \App\Usuario())
                            @if($perfil->getId() != \App\Usuario::usuarioLogado()->getId())
                                @if($perfil->isAtivo() && $perfil->getId() != \App\Usuario::usuarioLogado()->getId())
                                    <a class="waves-effect modal-trigger"
                                       href="#modal{{$perfil->getId()}}">Desativar</a>
                                    <div id="modal{{$perfil->getId()}}" class="modal">
                                        <div class="modal-content">
                                            Realmente deseja desativar este usuário?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!"
                                               class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                                            <a class="btn orange darken-1"
                                               href="{{route('admin.desativar.usuario', $perfil->getId())}}">Sim</a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{route('admin.ativar.usuario', $perfil->getId())}}">Ativar</a>
                                @endif
                            @endif
                            <a href="{{route('admin.editar.usuario', array('acao' => "editar", 'id'=>$perfil->getId()))}}">Editar</a>
                            @if($perfil->getId() != \App\Usuario::usuarioLogado()->getId())
                                <a class="waves-effect modal-trigger" href="#modal{{$perfil->getId()}}">Excluir</a>
                                <div id="modal{{$perfil->getId()}}" class="modal">
                                    <div class="modal-content">
                                        Realmente deseja excluir este usuário?
                                    </div>
                                    <form action="{{route('admin.excluir.usuario')}}" method="post">
                                        <div class="modal-footer">
                                            <a href="#!"
                                               class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                                            <input type="hidden" name="id" value="{{$perfil->getId()}}"/>
                                            <button type="submit" class="btn  red darken-3">Sim</button>
                                            {{csrf_field()}}
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endcan
                        <a class="grey-text right text-darken-4" href="{{URL::previous()}}">Voltar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection