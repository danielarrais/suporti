@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <br/>
    <div class="row container">
        <div class="card no-shadow no-border">
            <div class="card-content no-padding-bot text-darken-4">
                <span class="card-title"> <b>{{$perfil->getNome()}} {{$perfil->getSobreNome()}}</b></span>
                <div class="row">
                    <div class="col s3 m3">
                        <label for="status{{$perfil -> getId()}}">Setor:</label>
                        <p id="status{{$perfil -> getId()}}">{{$perfil->getSetor->getSetor()}}</p>
                    </div>
                    <div class="col s3 m3">
                        <label for="status{{$perfil -> getId()}}">Função:</label>
                        <p id="status{{$perfil -> getId()}}">{{$perfil->getFuncao->getFuncao()}}</p>
                    </div>
                    <div class="col s3 m3">
                        <label for="status{{$perfil -> getId()}}">Email:</label>
                        <p id="status{{$perfil -> getId()}}">{{$perfil->getEmail()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection