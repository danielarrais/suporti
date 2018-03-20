@php($nivel = \App\Usuario::usuarioLogado()->getNivel->getNivel())
@can('pegar-chamado',$chamado)
    <a href="{{route('suporte.chamado.atender', $chamado->getId())}}">Pegar</a>
@endcan
@can('finalizar-chamado', $chamado)
    <a href="{{route('suporte.chamado.finalizar', $chamado->getId())}}">Finalizar</a>
@endcan
@can('rejeitar-chamado', $chamado)
    <a href="{{route('suporte.chamado.rejeitar.form', $chamado->getId())}}">Rejeitar</a>
@endcan
@can('excluir-chamado', $chamado)
    <a href="{{route('user.chamado.excluir', $chamado->getId())}}">Cancelar</a>
@endcan
<a href="{{route(($nivel==1|| $nivel== 2? 'suporte' : 'user').'.chamado.vizualizar', $chamado->getId())}}">Visualizar</a>