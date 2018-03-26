<div class="row">
    <div class="input-field col s6">
        <input value="@if($usuario!=null){{$usuario->getNome()}}@endif" placeholder="Informe seu nome" id="nome" name="nome" type="text">
        <label for="nome">Nome</label>
    </div>
    <div class="input-field col s6">
        <input  value="@if($usuario!=null){{$usuario->getSobrenome()}}@endif" placeholder="Informe seu sobrenome" id="sobrenome" name="sobrenome" type="text">
        <label for="sobrenome">Sobrenome</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        <input required="true" value="@if($usuario!=null){{$usuario->getEmail()}}@endif" placeholder="Informe seu sobrenome" type="email" id="email" name="email" type="text">
        <label for="email">Email</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s4">
        <select  value="" id="nivel" name="nivel">
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach($niveis as $nivel)
                <option selected="@if($usuario->getNivel->getId()==$nivel->getId()){{true}}@endif" value="{{$nivel->getId()}}">{{$nivel->getNivel()}}</option>
            @endforeach
        </select>
        <label for="nivel"> Nivel de acesso</label>
    </div>
    <div class="input-field col s4">
        <select name="setor">
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach($setores as $setor)
                <option selected="@if($usuario->getSetor->getId()==$setor->getId()){{true}}@endif" value="{{$setor->getId()}}">{{$setor->getSetor()}}</option>
            @endforeach
        </select>
        <label for="setor">Setor de atuação</label>
    </div>
    <div class="input-field col s4">
        <select id="funcao" name="nivel">
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach($funcoes as $funcao)
                <option selected="@if($usuario->getFuncao->getId()==$funcao->getId()){{true}}@endif" value="{{$funcao->getId()}}">{{$funcao->getFuncao()}}</option>
            @endforeach
        </select>
        <label for="funcao">Função</label>
    </div>

</div>

<div class="row">
    <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
    </button>
</div>
{{csrf_field()}}