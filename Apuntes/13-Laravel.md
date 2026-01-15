# Introducción a Laravel

 <a href="https://aitor-medrano.github.io/dwes2122/07frameworks.html">Apuntes de Aitor Medrano</a>

## Laravel
Laravel es un framework de desarrollo de aplicaciones web de código abierto y de alto nivel, escrito en PHP. Fue creado por Taylor Otwell en 2011 y se ha convertido en uno de los frameworks más populares y ampliamente utilizados en la comunidad de desarrollo web.

Laravel sigue el patrón de diseño MVC (Modelo-Vista-Controlador), lo que proporciona una estructura organizada y modular para construir aplicaciones web. Proporciona una amplia gama de características y herramientas que facilitan el desarrollo rápido y eficiente de aplicaciones web robustas y escalables.

Algunas de las características destacadas de Laravel incluyen:

1. Enrutamiento: Laravel proporciona un sistema de enrutamiento fácil de usar que permite definir rutas para diferentes URI y métodos HTTP.

2. ORM (Object-Relational Mapping): Laravel incluye un ORM llamado Eloquent, que simplifica la interacción con la base de datos al proporcionar una forma intuitiva de trabajar con modelos y consultas.

3. Migraciones de base de datos: Laravel ofrece migraciones de base de datos, que permiten mantener el control de los cambios en la estructura de la base de datos a través de archivos de migración.

4. Plantillas Blade: Laravel utiliza el motor de plantillas Blade, que proporciona una sintaxis sencilla y expresiva para trabajar con vistas y facilita la reutilización de código.

5. Autenticación y autorización: Laravel proporciona un sistema de autenticación y autorización completo y fácil de usar, que incluye características como el registro de usuarios, inicio de sesión, restablecimiento de contraseñas y control de acceso basado en roles.

6. Pruebas automatizadas: Laravel tiene soporte integrado para pruebas automatizadas, lo que facilita la escritura y ejecución de pruebas unitarias y de integración para garantizar la calidad del código.

El modelo de funcionamiento es el siguiente:

![](images/mvc_diagram_with_routes.png)

## Estructura de un proyecto Laravel
La estructura de un proyecto de Laravel sigue una convención bien definida que organiza los archivos y directorios de manera lógica y coherente. Aquí tienes una descripción de los principales directorios y archivos en un proyecto de Laravel:

1. `app`: Este directorio es el corazón de la aplicación y contiene la lógica de negocio de tu proyecto. Aquí encontrarás los modelos (archivos que representan las tablas de la base de datos), controladores (archivos que manejan las solicitudes HTTP y orquestan la lógica de la aplicación) y otros archivos relacionados con la lógica de la aplicación.

2. `bootstrap`: Este directorio contiene archivos relacionados con el inicio de la aplicación, como la carga de la configuración y la configuración del autoloading de clases.

3. `config`: Aquí se encuentran los archivos de configuración de la aplicación. Puedes definir la configuración de la base de datos, el correo electrónico, el almacenamiento en caché y otros aspectos de la aplicación en estos archivos.

4. `database`: En este directorio se encuentran los archivos relacionados con la base de datos. Aquí puedes definir las migraciones (archivos que representan cambios en la estructura de la base de datos), los seeders (archivos que se utilizan para poblar la base de datos con datos de prueba) y otros archivos relacionados con la base de datos.

5. `public`: Este directorio es el punto de entrada de tu aplicación y contiene el archivo `index.php`, que es el archivo que se ejecuta cuando se realiza una solicitud HTTP a tu aplicación. También encontrarás archivos estáticos como imágenes, hojas de estilo CSS y archivos JavaScript en este directorio.

6. `resources`: Aquí se almacenan los recursos de la aplicación, como las vistas (archivos de plantillas que definen la interfaz de usuario), los archivos de lenguaje y los archivos de assets (como hojas de estilo y scripts JavaScript) sin compilar.

7. `routes`: En este directorio encontrarás los archivos de definición de rutas de tu aplicación. Las rutas determinan cómo se manejan las solicitudes HTTP y qué controlador y método se ejecutan para cada ruta.

8. `storage`: Este directorio almacena archivos generados por la aplicación, como archivos de registro, archivos de sesión y archivos cargados por los usuarios. También contiene subdirectorios para almacenar archivos en caché, vistas compiladas y otros archivos generados.

9. `tests`: Aquí se encuentran los archivos de pruebas de tu aplicación. Laravel incluye un sistema de pruebas integrado que te permite escribir y ejecutar pruebas unitarias y de integración para asegurarte de que tu código funcione correctamente.

10. `vendor`: Este directorio contiene las dependencias de tu proyecto, que son administradas por Composer, el administrador de paquetes de PHP. Aquí se almacenan los paquetes y bibliotecas de terceros utilizados en tu proyecto.

Además de estos directorios principales, también encontrarás archivos como `.env` (archivo de configuración de variables de entorno), `composer.json` (archivo de configuración de Composer) y otros archivos de configuración y utilidad.

Esta es una descripción general de la estructura de un proyecto de Laravel. Cabe destacar que Laravel es altamente personalizable y puedes ajustar la estructura y los nombres de los directorios según tus necesidades, utilizando las configuraciones y convenciones proporcionadas por el framework.


## Instalación de laravel
Las herramientas o tooling que necesitamos para laravel son:
- PHP
- Composer
- node js (no es estrictamente necesario, pero para vistas avanzadasl, por ejemplo, para usar *vite* lo necesitamos
- XAMPP (Apache + MYSQL)

Existe un entorno llamado **Laravel Herd** que se encarga de instalarlo todo, permite dominios automáticos, gestion de versiones de PHP, etc. Pero, en un entorno de inicio, educativo, no es necesario. Además, tenemos instalado casi todo lo que necesitamos.

### Crear nuevo proyecto en Laravel sin el instalador de laravel
De esta forma vamos más paso a paso.
```
#composer create-project --prefer-dist laravel/laravel blog
#cp .env.example .env
—> Acceder a .env y poner los parámetros de configuración de la bbdd
#php artisan key:generate
#php artisan migrate
#php artisan serve
```

### Crear nuevo proyecto con el instalador de laravel
Hay que instalar el instalador de forma global con
```
#composer global require laravel/installer
```
Una vez instalado, asegurarnos que el comando `#laravel` esta accesible. Sino, incluir en el path
la ruta $HOME/.composer/vendor/bin, que es donde está dicho comando.

Mac/Linux
Editar el archivo .profile o .zprofile del directorio home del usuario. 
```
export PATH="/Applications/XAMPP/bin:$PATH"
export PATH="$HOME/.composer/vendor/bin:$PATH"
```
```
#laravel new blog       creamos un nuevo proyecto llamado blog
#composer run dev       lanzamos el servidor
```

## Introducción a las rutas. Definición y nombrado.
Las rutas web se definen en `routes/web.php`

📌 Ruta básica (si accedes a /, se muestra la vista 'home')
```  
Route::get('/', function () {
    return view('home');
});
```
Para que esto funcione, tenemos que tener una vista llamada `home.php` o `home.blade.php`, según si no queremos usar blade o sí, dentro de la carpeta `resources/views/`

Normalmente, a las rutas les asignamso un nombre para poder luego referenciarlas de manera sencilla, de la forma `<a href="{{ route('home') }}">Inicio</a>`

```
Route::get('/', function () {
    return view('home');
})->name('home');
```

Route::get('/contacto', function () {
    return view('contacto');
})->name('home');

```

TIP: Marcar opción activa en el menú en una vista. 
```html
Si estamos en la ruta 'home', asígnale la clase 'active'

<a href="{{ route('home') }}"
   class="{{ request()->routeIs('home') ? 'active' : '' }}">
   Inicio
</a>

```


## Motor de plantillas Blade
Blade es el motor de plantillas de Laravel. Permite:
	•	Reutilizar vistas
	•	Separar estructura y contenido
	•	Usar PHP de forma limpia

📌 Sintaxis básica

{{ $variable }}          {{-- Mostrar datos --}}  
@if() @endif             {{-- Condicionales --}}  
@foreach() @endforeach   {{-- Bucles --}}  

⸻

### Layout genérico
Un layout es la estructura común de la web (HTML base). Con blade podemos crear plantillas y componentes que nos permiten reutilizar vistas. 
A la hora de definit el layout principal, este actua como padre y luego tiene como hijos el menú, el footer, el contenido. 

El layout o plantilla padre se suele definir en `resources/views/layouts/app.blade.php`

🧱 1. Ejemplo de layout

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi Web')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.menu')

    <main class="container">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
```

🧠 Directivas usadas  
@yield	Define un hueco de contenido  
@include	Incluye otra vista


⸻

🧭 2. Vistas menú y footer
Se usan para reutilizar fragmentos comunes. Se encuentran en `resources/views/partials/menu.blade.php`y `resources/views/partials/footer.blade.php`

📌 Ejemplo de menú
```html
<nav>
    <ul>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
    </ul>
</nav>
```

🏠 3. Vista hija (home)  
Una vista hija hereda del layout. Ubicada en `resources/views/home.blade.php`

🧱 Ejempplo
```blade
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido</h1>
    <p>Página principal con Blade</p>
@endsection
```

🧠 Directivas usadas  
@extends	Hereda un layout  
@section	Rellena un @yield  



