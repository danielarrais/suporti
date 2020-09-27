<div class="row">
    <input type="hidden" name="id" value="@if($acao == "editar" && $usuario!=null){{$usuario->getId()}}@endif"/>
    <div class="input-field col s6">
        <input  value="@if($acao == "editar" && $usuario!=null){{$usuario->getNome()}}@else{{old('nome')}}@endif" placeholder="Informe seu nome" id="nome" name="nome" type="text">
        <label for="nome">Nome</label>
    </div>
    <div class="input-field col s6">
        <input required="true" value="@if($acao == "editar" && $usuario!=null){{$usuario->getSobrenome()}}@else{{old('sobrenome')}}@endif" placeholder="Informe seu sobrenome" id="sobrenome" name="sobrenome" type="text">
        <label for="sobrenome">Sobrenome</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        <input required="true" value="@if($acao == "editar" && $usuario!=null){{$usuario->getEmail()}}@else{{old('email')}}@endif" placeholder="Informe seu sobrenome" type="email" id="email" name="email" type="text">
        <label for="email">Email</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s4">
        <select required id="nivel" name="nivel">
            <option value="" disabled @if($acao == "novo"){{'selected'}}@endif>Selecione uma opção</option>
            @foreach($niveis as $nivel)
                <option @if(($acao == "editar" && $usuario->getNivel->getId()==$nivel->getId())||old('nivel')==$nivel->getId()){{'selected'}}@endif value="{{$nivel->getId()}}">{{$nivel->getNivel()}}</option>
            @endforeach
        </select>
        <label for="nivel"> Nivel de acesso</label>
    </div>
    <div class="input-field col s4">
        <select required name="setor" id="setor">
            <option value="" disabled @if($acao == "novo"){{'selected'}}@endif>Selecione uma opção</option>
            @foreach($setores as $setor)
                <option @if(($acao == "editar" && $usuario->getSetor->getId()==$setor->getId())||old('setor')==$setor->getId()){{'selected'}}@endif value="{{$setor->getId()}}">{{$setor->getSetor()}}</option>
            @endforeach
        </select>
        <label for="setor">Setor de atuação</label>
    </div>
    <div class="input-field col s4">
        <select required id="funcao" name="funcao">
            <option value="" disabled @if($acao == "novo"){{'selected'}}@endif>Selecione uma opção</option>
            @foreach($funcoes as $funcao)
                <option @if(($acao == "editar" && $usuario->getFuncao->getId()==$funcao->getId())||old('funcao')==$funcao->getId()){{'selected'}}@endif value="{{$funcao->getId()}}">{{$funcao->getFuncao()}}</option>
            @endforeach
        </select>
        <label for="funcao">Função</label>
    </div>

</div>

<div class="row">
    <a class="grey-text  text-darken-4" href="{{route('admin.usuarios')}}">Voltar</a>
    <button class="btn right waves-effect waves-light" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
    </button>
</div>
{{csrf_field()}}