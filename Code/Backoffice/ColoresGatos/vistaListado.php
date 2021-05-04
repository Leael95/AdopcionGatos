<?php // --------------------------------------------

require "controller.php";
$listadoColores = listar();

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
    <?php while($colorGato = mysqli_fetch_assoc($listadoColores)) : ?>
        <tr>
            <td>
                <?php echo $colorGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar">
                <input type="button" value="Eliminar">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>