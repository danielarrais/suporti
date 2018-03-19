<div class="card no-shadow no-border">
    <div class="card-content no-padding-bot text-darken-4">
        <span class="card-title"> <b>Chamado {{$chamado -> getId()}}
                : {{$chamado->getTitulo()}}</b> <label>À {{$chamado->tempoDesdeAbertura()}} dias</label> </span>
        <div class="row">
            <div class="col s3 m3">
                <label for="autor{{$chamado -> getId()}}">Autor:</label>
                <p id="autor{{$chamado -> getId()}}"><a target="_blank"
                                                        href="{{route('user.perfil.vizualizar', $chamado->getUsuario->getId())}}">{{$chamado->getUsuario->getNome()}}</a>
                </p>
            </div>
            <div class="col s2 m2">
                <label for="status{{$chamado -> getId()}}">Status:</label>
                <p id="status{{$chamado -> getId()}}">{{$chamado->getStatus->getStatus()}}</p>
            </div>
            <div class="col s4 m4">
                <label for="abertura{{$chamado -> getId()}}">Horário de abertura:</label>
                <p id="abertura{{$chamado -> getId()}}">{{date('d \d\o m \d\e Y', strtotime($chamado->getHAbertura()))}}
                    às {{date('h\hi', strtotime($chamado->getHAbertura()))}}</p>
            </div>
            <div class="col s3 m3">
                <label for="urgencia{{$chamado -> getId()}}">Urgência:</label>
                <p id="urgencia{{$chamado -> getId()}}">{{$chamado->getUrgencia->getUrgencia()}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col s3 m3">
                <label for="abertura{{$chamado -> getId()}}">Horário de finalização:</label>
                @if($chamado->getHFechamento() != null)
                    <p id="abertura{{$chamado -> getId()}}">{{date('d \d\o m \d\e Y', strtotime($chamado->getHFechamento()))}}
                        às {{date('h\hi', strtotime($chamado->getHFechamento()))}}</p>
                @else
                    <p id="atendente{{$chamado -> getId()}}">Ainda não finalizado</p>
                @endif
            </div>
            <div class="col s2 m2">
                <label for="atendente{{$chamado -> getId()}}">Atendente:</label>
                <p id="atendente{{$chamado -> getId()}}">{{$chamado->getAtendente != null? $chamado->getAtendente->getNome():"Nenhum"}}</p>
            </div>
            <div class="col s5 m5">
                <label for="descricao{{$chamado -> getId()}}">Descrição:</label>
                <p id="descricao{{$chamado -> getId()}}">{{$chamado->getDescricao()}}</p>
            </div>
        </div>
    </div>
    <div class="card-action">
        @if(true)
            @if($chamado->getStatus->getId() == 1)
                <div class="right-align">
                    <a class="left" href="{{route('suporte.chamado.atender', $chamado->getId())}}">Pegar</a>
                </div>
            @endif
        @endif
        <div class="right-align">
            <a class="grey-text text-darken-4" href="{{route('suporte.home')}}">Voltar</a>
        </div>
    </div>
</div>