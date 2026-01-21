@extends('layouts.aplicacion')

@section('title', 'Listado')

@section('content')
    <h1>{{ $nombre_biblioteca}}</h1>

    <table>
    <thead>
        <tr>
            <th>Autor</th>
            <th>Título</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro['nombre'] }}</td>
                <td>{{ $libro['titulo'] }}</td>
                <td>{{ $libro['genero'] }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>


    
@endsection

