@extends('templates.site')
@section('titulo','Novo Chamado')
@section('corpo')
    <div class="row container center-align">
        <br>
        <div class="center-align">
            <div class="text-center">
                <h3>Realizar um chamado</h3>
            </div>
        </div>
        <br>
        <div class="col s1"></div>
        <form class="col s10" action="{{route('user.chamado.sucesso')}}" method="post" enctype="multipart/form-data">
            @if(count($errors)!=0)
                <div class="card-content left-align">
                    @foreach($errors->all() as $erro)
                        <span class="red-text text-accent-4">{{$erro}}</span><br/>
                    @endforeach
                </div>
                <br/>
            @endif
            <div class="row">
                <div class="input-field col s12">
                    <input value="{{old('titulo')}}" placeholder="Descreva aqui de forma breve o problema" id="problema" name="titulo" type="text">
                    <label for="problema">Problema</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea value="{{old('descricao')}}" id="descricao" name="descricao" class="materialize-textarea" placeholder="Nos dê mais detalhes do problema" ></textarea>
                    <label for="descricao">Detalhes</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select required name="urgencia">
                        <option value="" disabled @if(old('urgencia')==''){{'selected'}}@endif>Selecione uma opção</option>
                        @foreach($urgencias as $urgencia)
                            <option @if(old('urgencia')==$urgencia->getId()){{'selected'}}@endif value="{{$urgencia->getId()}}">{{$urgencia->getUrgencia()}}</option>
                        @endforeach
                    </select>
                    <label>Urgência</label>
                </div>
                <div class="input-field file-field col s6">
                    <div class="btn blue">
                        <span>Print</span>
                        <input value="{{old('imagem')}}" type="file" name="imagem"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Solicitar
                    <i class="material-icons right">send</i>
                </button>
            </div>
            {{csrf_field()}}
        </form>
        <div class="col s1"></div>
    </div>
@endsection