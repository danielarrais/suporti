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
                @include('include.chamadoResumo')
            @endforeach
        </div>
    </div>
    <div id="abertos" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 1)
                    @include('include.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="emAtendimento" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 2)
                    @include('include.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="finalizados" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 3)
                    @include('include.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
</div>
