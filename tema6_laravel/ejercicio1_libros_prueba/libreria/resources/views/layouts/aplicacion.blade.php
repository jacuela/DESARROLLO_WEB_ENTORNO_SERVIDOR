<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi web Laravel')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    
    {{-- Menú --}}
    @include('layouts.menu')

    {{-- Contenido principal --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    
</body>
</html>
