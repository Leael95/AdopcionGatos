<?php // --------------------------------------------

require "controller.php";
$listadoEstadoTramiteAdopcion = listar();

// -------------------------------------------------- ?> 

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear">

<br>
<br>

<table>
    <head>
        <th>Color</th>
        <th>Acciones</th>
    </head>
    <body>
    <?php while($estadoTramiteAdopcionGato = mysqli_fetch_assoc($listadoEstadoTramiteAdopcion)) : ?>
        <tr>
            <td>
                <?php echo $estadoTramiteAdopcionGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar">
                <input type="button" value="Eliminar">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>