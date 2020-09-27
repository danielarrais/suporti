@extends('templates.site')
@section('titulo','Sucesso')
@section('corpo')
    <div class="row container center-align">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h1>Erro 404</h1>
                <h4>Xiiii, parece que a página que você tentou acessar não existe! </h4>
                <div class="right-align">
                    <a class="grey-text text-darken-4" href="{{route('suporte.home')}}">Voltar</a>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection