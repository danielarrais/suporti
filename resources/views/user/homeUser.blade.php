@extends('templates.site')
@section('titulo', 'Home')
@section('corpo')
    <div class="container">
        <br>
        @if(Session::has('alterada'))
            <span class="green-text text-accent-4">{{ Session::get('alterada')}}</span><br>
        @endif
        <div class="row center-align">
            <h5>Chamados que você fez </h5>
        </div>
        <form class="row" action="{{route('user.chamado.buscar')}}" method="post" enctype="multipart/form-data">
            <div class="col s2 m2 input-field">
                <a href="{{route('user.chamado')}}" class="waves-effect waves-light btn">Novo Chamado</a>
            </div>
            <div class="col s8 m8 input-field">
                <input placeholder="Buscar chamado" type="text" name="busca">
            </div>
            <div class="col s2 m2 input-field">
                <button class="btn waves-effect waves-light" type="submit" name="action">Buscar
                    <i class="material-icons right">search</i>
                </button>
            </div>

            {{csrf_field()}}
        </form>
        <div class="row">
            @include('includes_uteis.chamados.listagemChamados')
        </div>
    </div>
@endsection