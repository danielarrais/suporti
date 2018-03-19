<!doctype html>
<html class="no-js" lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{url('css/materialize.min.css')}}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{url('css/app.css')}}" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('titulo') - SUPORTI</title>
</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper grey darken-4">
            <div class="container">
                <a href="{{route('site.home')}}"> <span style="font-size:32px; color:#FFFFFF;">SUPOR</span><span
                            style="font-size:32px; color:#FFFF00;">TI</span></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                @if(Auth::guest())
                    <ul class="right hide-on-med-and-down">
                        <a href="{{route('site.login')}}" class="write">Login</a>
                    </ul>
                    <ul class="side-nav grey darken-4" id="mobile-demo">
                        <a href="{{route('site.login')}}" class="write">Login</a>
                    </ul>
                @else


                    <ul class="right hide-on-med-and-down">
                        <ul id="dropdown4" class="dropdown-content">
                            <li><a href="{{route('suporte.home')}}">Chamados</a></li>
                        </ul>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown4">Suporte<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="{{route('user.home')}}">Chamados</a></li>
                            <li><a href="#!">Perfil</a></li>
                            <li><a href="{{route('site.login.sair')}}">Sair</a></li>
                        </ul>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{Auth::user()->name}}<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <ul id="dropdown3" class="dropdown-content">
                            <li><a href="{{route('suporte.home')}}">Ver chamados</a></li>
                        </ul>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Suporte<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                        <ul id="dropdown2" class="dropdown-content">
                            <li><a href="{{route('user.home')}}">Chamados</a></li>
                            <li><a href="#!">Perfil</a></li>
                            <li><a href="{{route('site.login.sair')}}">Sair</a></li>
                        </ul>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">{{Auth::user()->name}}<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
<main>