@can('master', new \App\Usuario())
    <ul id="dropdown3{{$drop}}" class="dropdown-content">
        <li><a href="{{route('admin.home')}}">Administração</a></li>
    </ul>

    <li>
        <a class="dropdown-button" href="#!" data-activates="dropdown3{{$drop}}">
            Sistema
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
@endcan
@can('suporte-ou-master', new \App\Usuario())
    <ul id="dropdown2{{$drop}}" class="dropdown-content">
        <li>
            <a href="{{route('suporte.home')}}">Chamados</a>
        </li>
    </ul>

    <li>
        <a class="dropdown-button" href="#!" data-activates="dropdown2{{$drop}}">
            Suporte
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
@endcan
<ul id="dropdown1{{$drop}}" class="dropdown-content">
    <li><a href="{{route('user.home')}}">Chamados</a></li>
    <li><a href="#!">Perfil</a></li>
    <li class="divider"></li>
    <li><a href="{{route('site.login.sair')}}">Sair</a></li>
</ul>
<li>
    <a class="dropdown-button" href="#!" data-activates="dropdown1{{$drop}}">
        {{Auth::user()->name}}
        <i class="material-icons right">arrow_drop_down</i>
    </a>
</li>