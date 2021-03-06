<div class="col s12 m12">
    <div class="card grey lighten-3">
        <div class="card-content no-padding-bot text-darken-4">
            <span class="card-title"> <b>Chamado {{$chamado -> getId()}} :</b> {{$chamado->getTitulo()}}
                <label>a {{$chamado->tempoDesdeAbertura()}} dia(s)</label></span>
            <div class="row">
                <div class="col s3 m3">
                    <label for="autor{{$chamado -> getId()}}">Autor:</label>
                    <p id="autor{{$chamado -> getId()}}"><a
                                href="{{route('user.perfil.vizualizar', $chamado->getUsuario->getId())}}">{{$chamado->getUsuario->getNome()}}</a>
                    </p>
                </div>
                <div class="col s3 m3">
                    <label for="urgencia{{$chamado -> getId()}}">Urgência:</label>
                    <p id="urgencia{{$chamado -> getId()}}">{{$chamado->getUrgencia != null ? $chamado->getUrgencia->getUrgencia():""}}</p>
                </div>
                <div class="col s3 m3">
                    <label for="status{{$chamado -> getId()}}">Status:</label>
                    <p id="status{{$chamado -> getId()}}">{{$chamado->getStatus->getStatus()}} @include('includes_uteis.chamados._card_ctions.modalRejeicao')</p>
                </div>
                <div class="col s3 m3">
                    <label for="atendente{{$chamado -> getId()}}">Atendente:</label>
                    @if($chamado->getAtendente != null)
                        <p id="atendente{{$chamado -> getId()}}">
                            <a target="_blank"
                               href="{{route('user.perfil.vizualizar', $chamado->getUsuario->getId())}}">{{$chamado->getAtendente->getNome()}}</a>
                        </p>
                    @else
                        <p id="atendente{{$chamado -> getId()}}">{{$chamado->getStatus->getStatus()}}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-action">
            @include('includes_uteis.chamados._card_ctions.cardActions')
        </div>
    </div>
</div>