<div class="row">
    <div class="col s12">
        <ul class="tabs grey lighten-3">
            <li class="tab col s3 active white-text grey darken-4"><a href="#todos">CHAMADOS</a></li>
            <li class="tab col s2"><a href="#abertos">Abertos</a></li>
            <li class="tab col s3"><a href="#emAtendimento">Em atendimento</a></li>
            <li class="tab col s2"><a href="#finalizados">Finalizados</a></li>
            <li class="tab col s2"><a href="#rejeitados">Rejeitados</a></li>
        </ul>
    </div>
    <div id="todos" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                    @include('includes_uteis.chamados.chamadoResumo')
            @endforeach
        </div>
    </div>
    <div id="rejeitados" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 4)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="abertos" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 1)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="emAtendimento" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 2)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="finalizados" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 3)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
</div>
