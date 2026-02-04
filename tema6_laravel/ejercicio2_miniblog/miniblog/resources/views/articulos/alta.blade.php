@extends('layout')

@section('content')
<h1>Nuevo articulo</h1>

<!-- tratar error  -->
     @if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
<!-- tratar error  -->


<form action="{{ route('store') }}" method="POST">
    @csrf

    <p>
        <label>Título</label><br>
        <input type="text" name="titulo">
    </p>

    <p>
        <label>Contenido</label><br>
        <textarea name="contenido" rows="5"></textarea>
    </p>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="{{ route('listar') }}">⬅ Volver</a>
@endsection