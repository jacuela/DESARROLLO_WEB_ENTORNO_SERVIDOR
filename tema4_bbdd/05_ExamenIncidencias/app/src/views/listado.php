


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
        
        <div class="tabla-contenedor">
        <table border="1" class="tabla">
        <thead>
            <tr>
                <th>TITULO</th>
                <th>NIVEL</th>
                <th>PROPIETARIO</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
        
            <tr class='fondo-verde'> |  <tr class='fondo-rojo'>    
                
                <td></td> <!-- campo titulo -->
                <td></td> <!-- campo nivel -->
                <td></td> <!-- campo propietario -->
                <!-- campo accion -->
                <td>
                        <!-- BOTON VER -->
                        <a href=""><button>VER</button></a> 
                </td>

            </tr>
        </tbody>
        </table>
        </div> 
        <div class="leyenda">
            <span class="color fondo-verde"></span> Resuelta &nbsp;&nbsp;
            <span class="color fondo-rojo"></span> Sin resolver
        </div>
        
        
            <div class="centrado">
            <br><br>    
            <!-- crea el formulario/enlace, hazlo como quieras con el atributo target="_blank" para que
                 se abra en otra pestaña -->
            
                <button type="submit" 
                    style="background-color:#0275d8; color:white; padding:10px 18px; border:none; border-radius:5px; cursor:pointer;">
                    GENERAR ESTADÍSTICAS EN PDF
                </button> 
            
            </div>
    </main>

    
</body>
</html>