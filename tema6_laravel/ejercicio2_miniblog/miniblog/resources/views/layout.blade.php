<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MiniBlog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        header {
            background: #3366cc;
            color: white;
            padding: 15px 20px;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }

        header a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background: white;
            margin-top: 20px;
            border-radius: 5px;
        }

        .post {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        button {
            background: #3366cc;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 3px;
        }

        button:hover {
            background: #274a8c;
        }
    </style>
</head>
<body>

<header>
    <a href="{{ route('listar') }}">Listado</a>
    <a href="{{ route('alta') }}">Nuevo articulo</a>
</header>

<div class="container">
    @yield('content')
</div>

</body>
</html>