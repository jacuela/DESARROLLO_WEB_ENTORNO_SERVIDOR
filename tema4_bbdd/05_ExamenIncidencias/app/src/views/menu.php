<?php
$nombre = $_SESSION["usuario"]["nombre"];
$rol = $_SESSION["usuario"]["rol"];
?>

<nav>
  <ul>
      <li><span style="color:red">Hola, <?= $nombre ?> (<?= $rol ?>)<span></li>
      <li><a class="menu" href="./../controllers/logout.php">Logout</a></li>
      <?php if($rol == "admin"): ?>
        <li><a class="menu" href="../controllers/crear_db.php">RESETEAR BBDD</a></li>
      <?php endif; ?>  
  </ul>
  <br>
</nav>

