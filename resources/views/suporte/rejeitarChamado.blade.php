@extends('templates.site')
@section('titulo', 'Chamados')
@section('corpo')
    <div class="row container center-align">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h4>Rejeitar chamado {{$chamado->getId()}} - {{$chamado->getTitulo()}}</h4>
            </div>
        </div>
        <br>
        <div class="col s1"></div>
        <form class="col s10" action="{{route('suporte.chamado.rejeitar')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" value="{{$chamado->getId()}}" name="id">
                <div class="input-field col s12">
                    <textarea id="motivo" name="motivo" required="true" class="materialize-textarea" placeholder="Descreva aqui o motivo da rejeição" ></textarea>
                    <label for="motivo">Motivo da rejeição do chamado</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Confirmar
                    <i class="material-icons right">send</i>
                </button>
            </div>
            {{csrf_field()}}
        </form>
        <div class="col s1"></div>
    </div>
@endsection