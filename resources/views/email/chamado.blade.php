<div class="card no-shadow no-border">
    <div class="card-content no-padding-bot text-darken-4">
        <span class="card-title"> <b>Chamado {{$chamado -> getId()}}</b></span><br>
        <div class="row">
            <div class="col s3 m3">
                <b for="autor{{$chamado -> getId()}}">Autor:</b><br>
                <p id="autor{{$chamado -> getId()}}"><a target="_blank"
                                                        href="{{route('user.perfil.vizualizar', $chamado->getUsuario->getId())}}">{{$chamado->getUsuario->getNome()}}</a>
                </p>
            </div>
            <div class="col s2 m2">
                <b for="status{{$chamado -> getId()}}">Status:</b><br>
                <p id="status{{$chamado -> getId()}}">{{$chamado->getStatus->getStatus()}} @include('includes_uteis.chamados._card_ctions.modalRejeicao')</p>
            </div>
            <div class="col s4 m4">
                <b for="abertura{{$chamado -> getId()}}">Horário de abertura:</b><br>
                <p id="abertura{{$chamado -> getId()}}">{{date('d \d\o m \d\e Y', strtotime($chamado->getHAbertura()))}}
                    às {{date('h\hi', strtotime($chamado->getHAbertura()))}}</p>
            </div>
            <div class="col s3 m3">
                <b for="urgencia{{$chamado -> getId()}}">Urgência:</b><br>
                <p id="urgencia{{$chamado -> getId()}}">{{$chamado->getUrgencia->getUrgencia()}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col s3 m3">
                <b for="abertura{{$chamado -> getId()}}">Horário de finalização:</b><br>
                @if($chamado->getHFechamento() != null)
                    <p id="abertura{{$chamado -> getId()}}">{{date('d \d\o m \d\e Y', strtotime($chamado->getHFechamento()))}}
                        às {{date('h\hi', strtotime($chamado->getHFechamento()))}}</p>
                @else
                    <p id="atendente{{$chamado -> getId()}}">-</p>
                @endif
            </div>
            <div class="col s2 m2">
                <b for="atendente{{$chamado -> getId()}}">Atendente:</b><br>
                <p id="atendente{{$chamado -> getId()}}">{{$chamado->getAtendente != null? $chamado->getAtendente->getNome():"Nenhum"}}</p>
            </div>
            <div class="col s5 m5">
                <b for="descricao{{$chamado -> getId()}}">Descrição:</b><br>
                <p id="descricao{{$chamado -> getId()}}">{{$chamado->getDescricao()}}</p>
                @if($chamado->getPrint != null)
                    <p><b>Print: </b><br><a target="_blank"
                                        href="{{url($chamado->getPrint->getUrl())}}">{{$chamado->getPrint->getNome()}}</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>