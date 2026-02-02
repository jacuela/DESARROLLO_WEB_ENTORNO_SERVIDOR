@extends('layouts.aplicacion')

@section('title', 'Listado')

@section('content')
    <h1>{{ $nombre_biblioteca}}</h1>

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro['id'] }}</td>
                <td>{{ $libro['titulo'] }}</td>
                <td>{{ $libro['autor'] }}</td>
                <td>{{ $libro['anio'] }}</td>
                <td>{{ $libro['genero'] }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    
@endsection

