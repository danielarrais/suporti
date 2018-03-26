@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <br/>
    <div class="row container">
        <h5>Editar usuário</h5>
        <br>
        <form class="col s10" action="{{route('user.chamado.sucesso')}}" method="post" enctype="multipart/form-data">
            @include('includes_uteis.usuarios.contentFormUsuario')
        </form>
    </div>
@endsection