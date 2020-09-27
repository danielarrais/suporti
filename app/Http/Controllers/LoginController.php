<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller{
    public function index(){
            return view('login');
    }

    public function logar(Request $request){
        $dados= $request->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])){
            if (!Usuario::usuarioLogado()->isAtivo()){
                return redirect()->route('site.login')->withErrors(['Erro! Usuário desativado!', 'Contate o suporte caso queira reativar a conta!']);
            }
            if(Usuario::usuarioLogado()->isTrocarSenha()){
                return redirect()->route('user.alterarsenha');
            }else{

            }
            return redirect()->route('suporte.home');
        }
        return redirect()->route('site.home');
    }
    public function sair(Request $request){
        Auth::logout();
        return redirect()->route('site.login');
    }
}
