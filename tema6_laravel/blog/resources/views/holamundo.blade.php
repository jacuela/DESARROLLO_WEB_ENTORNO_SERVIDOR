
@extends('layouts.aplicacion')

@section('title', 'Contacto')

@section('content')
    <h1>HOLA MUNDO</h1>

    <p>
        Hola {{ $nombre }} {{ $apellidos}},
        eres de {{ $localidad }}
    </p>
@endsection