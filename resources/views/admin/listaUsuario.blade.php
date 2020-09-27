@extends('templates.site')
@section('titulo', 'Usuarios do sistema')
@section('corpo')
    <div class="container">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h4>Deseja cadastrar um novo usuário? <a href="{{route('admin.novo.usuario','novo')}}"
                                                         class="waves-effect waves-light btn">Cadastrar</a></h4>
            </div>
        </div>
        <br>
        @if(Session::has('message'))
            <div class="green-text text-accent-4">
                {{ Session::get('message') }}
            </div>
            <br>
        @endif
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Setor</th>
                <th>Nivel</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td><a href="{{route('user.perfil.vizualizar', $usuario->getId())}}">{{$usuario->getNome()}}</a>
                    </td>
                    <td>{{$usuario->getSetor->getSetor()}}</td>
                    <td>{{$usuario->getNivel->getNivel()}}</td>
                    <td>
                        @php($num = random_int(1, 999999))
                        @if(Session::has('novasenha'))
                            @if(Session::get('iduser') == $usuario->getId())
                                <a class="waves-effect red-text text-darken-3 modal-trigger"
                                   href="#modal{{$usuario->getId().$num}}">Gerar outra</a>
                            @endif
                        @endif
                        @if(!Session::has('novasenha')||Session::get('iduser') != $usuario->getId())
                            <a class="waves-effect red-text text-darken-3 modal-trigger"
                               href="#modal{{$usuario->getId().$num}}">Nova senha</a>
                        @endif

                        <div id="modal{{$usuario->getId().$num}}" class="modal">
                            <div class="modal-content">
                                Realmente deseja gerar uma nova senha para este usuário?
                                Ao realizar tal ação, o usuário terá de alterar a senha no primeiro login
                            </div>
                            <form action="{{route('admin.senha.usuario')}}" method="post">
                                <div class="modal-footer">
                                    <a href="#!"
                                       class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                                    <input type="hidden" name="id" value="{{$usuario->getId()}}"/>
                                    <button type="submit" class="btn  red darken-3">Sim</button>
                                    {{csrf_field()}}
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        @php($num = random_int(1, 999999))
                        @if($usuario->isAtivo())
                            <a class="waves-effect modal-trigger @if($usuario->getId() == \App\Usuario::usuarioLogado()->getId()){{'disativado'}}@else{{'orange-text text-darken-1'}}@endif"
                               href="#modal{{$usuario->getId().$num}}">Desativar</a>
                            <div id="modal{{$usuario->getId().$num}}" class="modal">
                                <div class="modal-content">
                                    Realmente deseja desativar este usuário?
                                </div>
                                <div class="modal-footer">
                                    <a href="#!"
                                       class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                                    <a class="btn orange darken-1"
                                       href="{{route('admin.desativar.usuario', $usuario->getId())}}">Sim</a>
                                </div>
                            </div>
                        @else
                            <a class="green-text text-accent-4"
                               href="{{route('admin.ativar.usuario', $usuario->getId())}}">Ativar</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.editar.usuario', array('acao' => "editar", 'id'=>$usuario->getId()))}}">Editar</a>
                    </td>
                    <td>
                        @php($num = random_int(1, 999999))
                            <a disabled="true" class="waves-effect modal-trigger @if($usuario->getId() == \App\Usuario::usuarioLogado()->getId()){{'disativado'}}@else{{'red-text text-darken-3'}}@endif"
                               href="#modal{{$usuario->getId().$num}}">Excluir</a>
                            <div id="modal{{$usuario->getId().$num}}" class="modal">
                                <div class="modal-content">
                                    Realmente deseja excluir este usuário?
                                </div>
                                <form action="{{route('admin.excluir.usuario')}}" method="post">
                                    <div class="modal-footer">
                                        <a href="#!"
                                           class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                                        <input type="hidden" name="id" value="{{$usuario->getId()}}"/>
                                        <button type="submit" class="btn  red darken-3">Sim</button>
                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
    </div>
@endsection