@extends('templates.site')
@section('titulo', 'Usuarios do sistema')
@section('corpo')
    <div class="container">
        <br>
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Setor</th>
                <th>Nivel</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->getNome()}}</td>
                    <td>{{$usuario->getSetor->getSetor()}}</td>
                    <td>{{$usuario->getNivel->getNivel()}}</td>
                    <td>
                        <a class="btn orange darken-1" href="#">Desativar</a>
                        <a class="btn" href="{{route('admin.editar.usuario', $usuario->getId())}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
    </div>
@endsection