@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="container">
        <br>
            <h3>Chamados</h3>
            @include('include.listagemChamados')
        <br>
    </div>
@endsection