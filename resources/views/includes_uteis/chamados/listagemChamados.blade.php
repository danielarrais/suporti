<div class="row">
    @php($num = random_int(1, 999999))
    <div class="col s12">
        <ul class="tabs grey lighten-3">
            <li class="tab col s3 active white-text grey darken-4"><a href="#todos{{$num}}">CHAMADOS</a></li>
            <li class="tab col s2"><a href="#abertos{{$num}}">Abertos</a></li>
            <li class="tab col s3"><a href="#emAtendimento{{$num}}">Em atendimento</a></li>
            <li class="tab col s2"><a href="#finalizados{{$num}}">Finalizados</a></li>
            <li class="tab col s2"><a href="#rejeitados{{$num}}">Rejeitados</a></li>
        </ul>
    </div>
    <div id="todos{{$num}}" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                    @include('includes_uteis.chamados.chamadoResumo')
            @endforeach
        </div>
    </div>
    <div id="rejeitados{{$num}}" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 4)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="abertos{{$num}}" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 1)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="emAtendimento{{$num}}" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 2)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
    <div id="finalizados{{$num}}" class="col s12">
        <div class="row">
            @foreach($chamados as $chamado)
                @if($chamado->getStatus->getId() == 3)
                    @include('includes_uteis.chamados.chamadoResumo')
                @endif
            @endforeach
        </div>
    </div>
</div>
