@if($chamado->getStatus->getId() == 4)
    {{--Criar gera um numero leatório para usar na identificação dos modais--}}
    @php($num = random_int(1, 999999))
    <a class="modal-trigger" href="#modal{{$num}}">motivo?</a>
    <div id="modal{{$num}}" class="modal">
        <div class="modal-content">
            <h4>Motivo da rejeição</h4>
            <p>{{$chamado->getMotivoRejeicao()}}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>
@endif