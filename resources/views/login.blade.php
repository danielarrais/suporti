@extends('templates.site')
@section('titulo','Login')
@section('corpo')
    <div>
        <div class="row container">
            <div class=" col s1 m2 l3 xl3"></div>
            <div class="col s10 m8 l6 xl6 center">
                <br class="hide-on-med-and-down"/><br/>
                <h5 class="grey-text text-darken-4">Faça login para continuar</h5>
                <br/>
                <div class="row z-depth-1 grey lighten-4" style="padding: 32px 48px 48px 48px; border: 1px solid #EEE;">
                    <form method="post" action="{{route('site.login.validar')}}">
                        <div class="row" style="margin-bottom: 5px !important;">
                            <div class="input-field col s12" style="margin-bottom: 0px !important;">
                                <input id="email" name="email"  class="validate" placeholder="Insira aqui seu Login/E-mail">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 0px !important;">
                            <div class="input-field col s12" style="margin: 0px !important;">
                                <input id="senha" name="senha" type="password" placeholder="Insira aqui sua senha">
                            </div>
                        </div>
                        <label class="right" style="margin-bottom: 20px !important;">
                            <a class='pink-text' href='#'><b>Esqueceu a senha?</b></a>
                        </label>
                        <br/>
                        <div class="row" style="margin-bottom: 0px !important;">
                            <div class="input-field col s12" style="margin: 0px !important;">
                                <input class="center btn waves-effect waves-light" type="submit" value="Login"/>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
            <div class=" col s1 m2 l3 xl3"></div>
        </div>
    </div>
@endsection
