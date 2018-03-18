<div class="card-content no-padding-bot text-darken-4">
    <span class="card-title"> <b>Chamado {{$chamado -> getId()}} : {{$chamado->getTitulo()}}</b></span>
    <div class="row">
        <div class="col s6 m6">
            <label for="autor{{$chamado -> getId()}}">Autor:</label>
            <p id="autor{{$chamado -> getId()}}">{{$chamado->getUsuario->getNome()}}</p>
        </div>
        <div class="col s6 m6">
            <label for="status{{$chamado -> getId()}}">Status:</label>
            <p id="status{{$chamado -> getId()}}">{{$chamado->getStatus->getStatus()}}</p>
        </div>

    </div>
    <div class="row">
        <div class="col s12 m12">
            <label for="descricao{{$chamado -> getId()}}">Descrição:</label>
            <p id="descricao{{$chamado -> getId()}}">{{$chamado->getDescricao()}}</p>
        </div>
    </div>
</div>