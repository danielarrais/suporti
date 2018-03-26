@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="container">
        <br>
        <div class="row">
            <div class="col hide-on-small-and-down m2">

            </div>
            <div class="col s6 m4">
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
            <div class="col s6 m4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"> Categorias </span>
                        <p>Gerencie as categorias de chamados</p>
                    </div>
                    <div class="card-action">
                        <a href="{{URL::previous()}}">Gerenciar</a>
                    </div>
                </div>
            </div>
            <div class="col hide-on-small-and-down m2">

            </div>
        </div>

        <br>
    </div>
@endsection