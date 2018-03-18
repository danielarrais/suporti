@extends('templates.site')
@section('titulo', 'Home')
@section('corpo')
    <div class="container">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h3>Deseja realizar um novo chamado?</h3>
                <a href="{{route('user.chamado')}}" class="waves-effect waves-light btn-large">iniciar</a>
            </div>
        </div>
        <br>
        <div class="row">
            <h5 class="center-align col s12">Chamados abertos</h5>
        </div>
        <div class="row">
            @foreach($chamados as $chamado)
                <div class="col s12 m12">
                    <div class="card grey lighten-3">
                        @include('include.conteudoCardChamado')
                        <div class="card-action">
                            <a href="{{route('user.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <a href="#"><h5 class="center-align col s12 no-padding indigo-text">Dias anteriores...</h5></a>
        </div>
        <br>
    </div>

@endsection