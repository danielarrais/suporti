@extends('templates.site')
@section('titulo', 'Usuarios do sistema')
@section('corpo')
    <br/>
    <div class="row container">
        <div class="col s5 m5">
            <h5>Nova função</h5>
            <form action="{{route('admin.salvar.setor')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="@if(isset($setor)){{$setor->getId()}}@endif">
                <div class="input-field">
                    <input placeholder="Nome da setor" type="text" value="@if(isset($setor)){{$setor->getSetor()}}@endif" name="setor">
                </div>
                <div class="row">
                    <button class="btn right waves-effect waves-light" type="submit" name="action">Salvar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col s1 m1"></div>
        <table class="col s6 m6">
            <thead>
            <tr>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
            @foreach($setores as $setor)
                <tr>
                    <td>{{$setor->getSetor()}}</td>
                    <td>
                        <a href="{{route('admin.editar.setores', $setor->getId())}}">Editar</a>
                    </td>
                    <td>
                        <a class="waves-effect red-text text-darken-3 modal-trigger" href="#modal{{$setor->getId()}}">Excluir</a>
                        <div id="modal{{$setor->getId()}}" class="modal">
                            <div class="modal-content">
                                Realmente deseja excluir este setor?
                            </div>
                            <form action="{{route('admin.excluir.setor')}}" method="post">
                                <div class="modal-footer">
                                    <a href="#!"
                                       class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                                    <input type="hidden" name="id" value="{{$setor->getId()}}"/>
                                    <button type="submit" class="btn red darken-3">Sim</button>
                                    {{csrf_field()}}
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
