<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class VisualizarPerfilController extends Controller
{
    public function carregarPerfil($id){
        $perfil = Usuario::find($id);
        return view('user.visualizarPerfil', compact('perfil'));
    }
}
