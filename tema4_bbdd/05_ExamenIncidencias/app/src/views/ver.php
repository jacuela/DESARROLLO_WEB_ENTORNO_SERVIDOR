<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../public/css/estilos.css">
    <title>Incidencias</title>
</head>
<body>
    <header>
        <h1>GESTOR DE INCIDENCIAS</h1>
    </header>
    
    <main>

        <form action="" method="POST" class="form-actualizar fondo-verde"> <!-- cambiar a fondo-rojo si esta sin resolver -->

            <!-- Título -->
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="" required>

            <!-- Descripción -->
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="5" required>TEXTO</textarea>

            <!-- Nivel -->
            <label for="nivel">Nivel:</label>
            <select id="nivel" name="nivel">
                <option value="normal" selected>Normal</option>
                <option value="urgente" selected>Urgente</option>
            </select>

            <!-- Resolución -->
            <label for="resolucion">Resolución:</label>
            <input type="text" id="resolucion" name="resolucion" 
                value="">

            <!-- Usuario -->
            <label for="nombre_usuario"> Usuario de la incidencia:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" 
                value="" disabled>

            <!-- Botones. Si no estan habilitados, indicar "disabled" -->    
            <button value="resolver" name="boton" type="submit">Resolver</button>
            <button value="volver" name="boton" type="submit">Volver</button>
            

        </form>
        <div class="leyenda">
            <span class="color fondo-verde"></span> Resuelta &nbsp;&nbsp;
            <span class="color fondo-rojo"></span> Sin resolver
        </div>
    </main>

</body>
</html>
