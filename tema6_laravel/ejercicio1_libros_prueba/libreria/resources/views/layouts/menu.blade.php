
<!-- <nav>
    <ul>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contacto') }}">Contacto</a></li>
    </ul>
</nav> -->


<nav>
    <ul>
        <li>
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'active' : '' }}">
                Inicio
            </a>
        </li>

        <li>
            <a href="{{ route('about') }}"
               class="{{ request()->routeIs('about') ? 'active' : '' }}">
                Sobre mi
            </a>
        </li>

        <li>
            <a href="{{ route('contacto') }}"
               class="{{ request()->routeIs('contacto') ? 'active' : '' }}">
                Contacto
            </a>
        </li>

         <li>
            <a href="{{ route('listado') }}"
               class="{{ request()->routeIs('listado') ? 'active' : '' }}">
                Listado
            </a>
        </li>
         <li>
            <a href="{{ route('altalibro') }}"
               class="{{ request()->routeIs('altalibro') ? 'active' : '' }}">
                Alta
            </a>
        </li>

    </ul>
</nav>