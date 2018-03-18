@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="container">
        <br>
        <div class="row">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs grey lighten-3">
                        <li class="tab col s3"><a class="active" href="#todos">Todos</a></li>
                        <li class="tab col s3"><a href="#abertos">Abertos</a></li>
                        <li class="tab col s3"><a href="#emAtendimento">Em atendimento</a></li>
                        <li class="tab col s3"><a href="#finalizados">Finalizados</a></li>
                    </ul>
                </div>
                <div id="todos" class="col s12">
                    <div class="row">
                        @foreach($chamados as $chamado)
                            <div class="col s12 m12">
                                <div class="card grey lighten-3">
                                    @include('include.conteudoCardChamado')
                                    <div class="card-action">
                                        <a href="{{route('suporte.chamado.atender', $chamado->getId())}}">Pegar</a>
                                        <a href="{{route('suporte.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="abertos" class="col s12">
                    <div class="row">
                        @foreach($chamadosAbertos as $chamado)
                            <div class="col s12 m12">
                                <div class="card grey lighten-3">
                                    @include('include.conteudoCardChamado')
                                    <div class="card-action">
                                        <a href="{{route('suporte.chamado.atender', $chamado->getId())}}">Pegar</a>
                                        <a href="{{route('suporte.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="emAtendimento" class="col s12"><div class="row">
                        @foreach($chamadosEmAtendimento as $chamado)
                            <div class="col s12 m12">
                                <div class="card grey lighten-3">
                                    @include('include.conteudoCardChamado')
                                    <div class="card-action">
                                        <a href="{{route('suporte.chamado.atender', $chamado->getId())}}">Pegar</a>
                                        <a href="{{route('suporte.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="finalizados" class="col s12"><div class="row">
                        @foreach($chamadosFinalizados as $chamado)
                            <div class="col s12 m12">
                                <div class="card grey lighten-3">
                                    @include('include.conteudoCardChamado')
                                    <div class="card-action">
                                        <a href="{{route('suporte.chamado.atender', $chamado->getId())}}">Pegar</a>
                                        <a href="{{route('suporte.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="#"><h5 class="center-align col s12 no-padding indigo-text">Dias anteriores...</h5></a>
        </div>
        <br>

@endsection