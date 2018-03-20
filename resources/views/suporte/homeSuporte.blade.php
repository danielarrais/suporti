@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="container">
        <br>
            @include('includes_uteis.chamados.listagemChamados')
        <br>
    </div>
@endsection