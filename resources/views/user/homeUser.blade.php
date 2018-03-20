@extends('templates.site')
@section('titulo', 'Home')
@section('corpo')
    <div class="container">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h4>Deseja realizar um novo chamado? <a href="{{route('user.chamado')}}" class="waves-effect waves-light btn">realizar</a></h4>
            </div>
        </div>
        <br>
        <div class="row">
            @include('includes_uteis.chamados.listagemChamados')
        </div>
    </div>
@endsection