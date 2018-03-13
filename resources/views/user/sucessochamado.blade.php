@extends('templates.site')
@section('titulo','Sucesso')
@section('corpo')
    <div class="row container center-align">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h3>Chamado realizado</h3>
                <h2>Agora é só aguardar o suporte</h2>
                <a href="{{route('user.home')}}">Pagina inicial</a>
                {{$_POST['titulo']}}
            </div>
        </div>
        <br>
    </div>
@endsection
