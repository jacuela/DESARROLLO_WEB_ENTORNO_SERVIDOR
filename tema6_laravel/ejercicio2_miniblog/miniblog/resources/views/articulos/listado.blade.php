@extends('layout')

@section('content')
<h1>MiniBlog</h1>

<hr>

@if (session('exito'))
    <p style="color: green;">{{ session('exito') }}</p>
@endif


@foreach ($articulos as $articulo)
    <div class="post">
        <h2>
            <a href="{{ route('ver', $articulo->id) }}">
                {{ $articulo->titulo }}
            </a>
        </h2>
        <form action="{{ route('borrar', $articulo->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">🗑 Borrar</button>
        </form>

        <small>Publicado el {{ $articulo->created_at->format('d/m/Y') }}</small>
    </div>
@endforeach
@endsection