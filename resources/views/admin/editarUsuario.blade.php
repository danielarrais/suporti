@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <br/>
    <div class="row container">
        <div class=" col s12">
            <h5>Editar usuário</h5>
            <br>
            @if(count($errors)!=0)
                <div class="card-content">
                    @foreach($errors->all() as $erro)
                        <span class="red-text text-accent-4">{{$erro}}<span></span><br/>
                    @endforeach
                </div>
                <br/>
            @endif
            <form action="{{route('admin.atualizar.usuario')}}" method="post" enctype="multipart/form-data">
                @include('includes_uteis.usuarios.contentFormUsuario')
            </form>
        </div>

    </div>
@endsection