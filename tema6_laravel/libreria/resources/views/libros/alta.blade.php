@extends('layouts.aplicacion')

@section('title', 'Alta')

@section('content')

    <h1>ALTA DE LIBRO</h1>

    <!--      -->
     @if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('storelibro') }}" method="POST">
    @csrf

    <label>
        Título:
        <input type="text" name="titulo" value="{{ old('titulo') }}">
    </label><br>

    <label>
        Autor:
        <input type="text" name="autor" value="{{ old('autor') }}">
    </label><br>

    <label>
        Género:
        <select name="genero">
            <option value="">-- Selecciona --</option>
            @foreach (['Novela','Fantasía','Terror','Romance','Ensayo'] as $genero)
                <option value="{{ $genero }}" 
                    {{ old('genero') == $genero ? 'selected' : '' }}>
                    {{ $genero }}
                </option>
            @endforeach
        </select>
    </label><br>

    <label>
        Año:
        <input type="number" name="anio" value="{{ old('anio') }}">
    </label><br>
    

    <label>
        Sinopsis:
        <textarea name="sinopsis">{{ old('sinopsis') }}</textarea>
    </label><br>
    <button type="submit">Guardar libro</button>
</form>


@endsection

