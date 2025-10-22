

<header>
  <h1>ALTA Y LOGIN DE USUARIOS</h1>
</header>
<nav>
  <ul>
    <li><a class="menu" href="listado.php">Listado</a></li>
    <li><a class="menu" href="alta-libro.php">Nuevo Libro</a></li>
    <?php if (isset($_SESSION['usuario'])): ?>
       
      <li><a class="menu2" href="perfil.php">Hola, <?=$_SESSION['usuario']?></a></li>
      <li><a class="menu" href="logout.php">Logout</a></li>
      
    
    <?php endif; ?>

  </ul>
  <br>
</nav>



