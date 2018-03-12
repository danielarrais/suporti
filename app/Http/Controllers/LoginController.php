<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller{

    public function index(){
        return view('login');
    }

    public function logar(Request $request){
        $dados= $request->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])){
            return redirect()->route('suporte.home');
        }
        return redirect()->route('site.home');
    }
    public function sair(Request $request){
        Auth::logout();
        return redirect()->route('site.login');
    }
}
