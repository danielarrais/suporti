@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="container">
        <br>
        <div class="row center-align">
            <h5>Chamados registrados no sistema </h5>
        </div>
        <form class="row" action="{{route('suporte.chamado.buscar')}}" method="post" enctype="multipart/form-data">
            <div class="col s10 m10 input-field">
                <input placeholder="Buscar chamado" type="text" name="busca">
            </div>
            <div class="col s2 m2 input-field">
                <button class="btn waves-effect waves-light" type="submit" name="action">Buscar
                    <i class="material-icons right">search</i>
                </button>
            </div>
            {{csrf_field()}}
        </form>
        <div class="row ">
            <ul class="tabs grey darken-1">
                <li class="tab col s6 m6 active"><a class="grey-text text-lighten-5" href="#all">TODOS</a></li>
                <li class="tab col s6 m6"><a class="grey-text text-lighten-5" href="#meus">MEUS</a></li>
            </ul>
        </div>
        <div id="all" class="col m12 s12">
            @include('includes_uteis.chamados.listagemChamados')
        </div>
        <div id="meus" class="col m12 s12">
            @php($chamados = $chamadosMeus)
            @include('includes_uteis.chamados.listagemChamados')
        </div>
        <br>
    </div>
@endsection