@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <div class="row container center-align">
        <h3>Chamado nº {{$chamado -> getId()}}</h3>

    </div>
@endsection