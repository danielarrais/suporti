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
                        @php($drop = 'desktop')
                        @include('templates.includes._dropdowns.dropdowns')
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        @php($drop = 'mobile')
                        @include('templates.includes._dropdowns.dropdowns')
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
<main>