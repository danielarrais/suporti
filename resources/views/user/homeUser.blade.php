@extends('templates.site')
@section('titulo', 'Home')
@section('corpo')
    <div class="container">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h3>Deseja realizar um novo chamado?</h3>
                <a href="{{route('user.chamado')}}" class="waves-effect waves-light btn-large">iniciar</a>
            </div>
        </div>
        <br>
        <div class="row">
            <h5 class="center-align col s12">Chamados realizados hoje</h5>
        </div>

        <table>
            <thead>
            <tr class="grey grey-text text-lighten-4">
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Urgência</th>
                <th>Atendimento</th>
                <th class="center-align">Ação</th>
            </tr>
            </thead>

            <tbody class="bordered">
            @foreach($chamados as $chamado)
            <tr>
                <td>{{$chamado->getTitulo()}}</td>
                <td>{{$chamado->getDescricao()}}</td>
                <td>{{$chamado->getUrgencia()}}</td>
                <td>{{$chamado->getStatus->getStatus()}}</td>
                <td class="center-align"><a href="{{route('user.chamado.excluir', $chamado->getId())}}" class="waves-effect waves-light btn">Já resolvi</a></td>
            </tr>
            @endforeach
            </tbody>

        </table>
        <caption>
            <div class="row">
                <a href="#"><h5 class="center-align col s12 no-padding indigo-text">Dias anteriores...</h5></a>
            </div>
        </caption>
        <br>
    </div>

@endsection