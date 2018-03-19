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
            <h5 class="center-align col s12">Seus chamados</h5>
        </div>
        <div class="row">
            @include('include.listagemChamados')
        </div>
    </div>
@endsection