@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="container">
        <br>
        <div class="row">
            <div class="col s4 m4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Usuarios</span>
                        <p>Gerencie os usuários do sistema</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('admin.usuarios')}}">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col s4 m4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Setores</span>
                        <p>Gerencie as setores da empresa</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('admin.setores')}}">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col s4 m4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"> Funcoes </span>
                        <p>Gerencie os cargos</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('admin.funcoes')}}">Gerenciar</a>
                    </div>
                </div>
            </div>
        </div>

        <br>
    </div>
@endsection