@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <br/>
    <div class="row container">
        <div class=" col s12">
            <h5>Editar usuário</h5>
            <br>
            <form action="{{route('user.chamado.sucesso')}}" method="post" enctype="multipart/form-data">
                @include('includes_uteis.usuarios.contentFormUsuario')
            </form>
        </div>

    </div>
@endsection