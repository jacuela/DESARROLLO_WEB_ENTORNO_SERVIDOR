
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDO</title>
     <link rel="stylesheet" href="./../../public/css/styles.css">
</head>
<body>
    <h1>LISTADO DE TAREAS</h1>

    <form action="PARA AÑADIR LA TAREA" method="POST" class="form-add">
        <input type="text" name="descripcion" placeholder="Nueva tarea..." required>
        <button type="submit">Añadir</button>
    </form>

    <ul class="task-list">
        <li class="<?= $t->completada ? 'done' : '' ?>">
            <?= ($t->descripcion) ?>

            <?php if (!$t->completada): ?>
                <form action="PARA COMPLETAR LA TAREA" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $t->id ?>">
                    <button type="submit">✔</button>
                </form>
            <?php endif; ?>

            <form action="PARA BORRAR LA TAREA" method="POST" class="inline">
                <input type="hidden" name="id" value="<?= $t->id ?>">
                <button type="submit">🗑️</button>
            </form>
        </li>
   
    </ul>
    
</body>
</html>
