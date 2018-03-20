@extends('templates.site')
@section('titulo','Sucesso')
@section('corpo')
    <div class="row container center-align">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h3>Acesso negado</h3>
                <h2>{{ $exception->getMessage() }}</h2>
                <div class="right-align">
                    <a class="grey-text text-darken-4" href="{{route('suporte.home')}}">Voltar</a>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
