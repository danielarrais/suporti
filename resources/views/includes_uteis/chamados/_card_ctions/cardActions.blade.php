@php($nivel = \App\Usuario::usuarioLogado()->getNivel->getNivel())
@can('pegar-chamado',$chamado)
    @php($num = random_int(1, 999999))
    <td>
        <a class="modal-trigger" href="#modal{{$chamado->getId().$num}}">Pegar</a>
        <div id="modal{{$chamado->getId().$num}}" class="modal">
            <div class="modal-content">
                Realmente deseja pegar este chamado para você?<br>
                <span> <b>Chamado {{$chamado -> getId()}} :</b> {{$chamado->getTitulo()}}</span>
            </div>
            <div class="modal-footer">
                <a href="#!"
                   class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                <input type="hidden" name="id" value="{{$chamado->getId()}}"/>
                <a class="btn green darken-3" href="{{route('suporte.chamado.atender', $chamado->getId())}}">Sim</a>
            </div>
        </div>
    </td>
@endcan
@can('finalizar-chamado', $chamado)
    @php($num = random_int(1, 999999))
    <td>
        <a class="modal-trigger" href="#modal{{$chamado->getId().$num}}">Finalizar</a>
        <div id="modal{{$chamado->getId().$num}}" class="modal">
            <div class="modal-content">
                Realmente deseja finalizar este chamado?<br>
                <span> <b>Chamado {{$chamado -> getId()}} :</b> {{$chamado->getTitulo()}}</span>
            </div>
            <div class="modal-footer">
                <a href="#!"
                   class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                <input type="hidden" name="id" value="{{$chamado->getId()}}"/>
                <a class="btn red darken-3" href="{{route('suporte.chamado.finalizar', $chamado->getId())}}">Sim</a>
            </div>
        </div>
    </td>
@endcan
@can('rejeitar-chamado', $chamado)
    @php($num = random_int(1, 999999))
    <td>
        <a class="modal-trigger" href="#modal{{$chamado->getId().$num}}">Rejeitar</a>
        <div id="modal{{$chamado->getId().$num}}" class="modal">
            <div class="modal-content">
                Realmente deseja rejeitar este chamado?<br>
                <span> <b>Chamado {{$chamado -> getId()}} :</b> {{$chamado->getTitulo()}}</span>
            </div>
            <div class="modal-footer">
                <a href="#!"
                   class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                <input type="hidden" name="id" value="{{$chamado->getId()}}"/>
                <a class="btn red darken-3" href="{{route('suporte.chamado.rejeitar.form', $chamado->getId())}}">Sim</a>
            </div>
        </div>
    </td>
@endcan
@can('excluir-chamado', $chamado)
    @php($num = random_int(1, 999999))
    <td>
        <a class="modal-trigger" href="#modal{{$chamado->getId().$num}}">Cancelar</a>
        <div id="modal{{$chamado->getId().$num}}" class="modal">
            <div class="modal-content">
                Realmente deseja cancelar este chamado?<br>
                <span> <b>Chamado {{$chamado -> getId()}} :</b> {{$chamado->getTitulo()}}</span>
            </div>
            <div class="modal-footer">
                <a href="#!"
                   class="modal-action modal-close waves-effect white-text green accent-4 btn-flat">Não</a>
                <input type="hidden" name="id" value="{{$chamado->getId()}}"/>
                <a class="btn red darken-3" href="{{route('user.chamado.excluir', $chamado->getId())}}">Sim</a>
            </div>
        </div>
    </td>
@endcan
<a href="{{route(($nivel==1|| $nivel== 2? 'suporte' : 'user').'.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>