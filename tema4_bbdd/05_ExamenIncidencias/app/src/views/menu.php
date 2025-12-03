<?php
$nombre = $_SESSION["usuario"]["nombre"];
$rol = $_SESSION["usuario"]["rol"];
?>

<nav>
  <ul>
  
      <li><span style="color:red">Hola, <?= $nombre ?> (<?= $rol ?>)<span></li>
      <li><a class="menu" href="./../controllers/logout.php">Logout</a></li>
   
  </ul>
  <br>
</nav>

