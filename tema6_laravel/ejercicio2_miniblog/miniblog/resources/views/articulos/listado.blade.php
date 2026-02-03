@extends('layout')

@section('content')
<h1>MiniBlog</h1>

<hr>

@foreach ($articulos as $articulo)
    <div class="post">
        <h2>
            <a href="{{ route('ver', $articulo->id) }}">
                {{ $articulo->titulo }}
            </a>
        </h2>
        <small>Publicado el {{ $articulo->created_at->format('d/m/Y') }}</small>
    </div>
@endforeach
@endsection