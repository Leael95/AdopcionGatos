<?php // --------------------------------------------

require "controller.php";
$listadoRazas = listar();

// -------------------------------------------------- ?> 

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear">

<br>
<br>

<table>
    <head>
        <th>Raza</th>
        <th>Acciones</th>
    </head>
    <body>
    <?php while($razaGato = mysqli_fetch_assoc($listadoRazas)) : ?>
        <tr>
            <td>
                <?php echo $razaGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar">
                <input type="button" value="Eliminar">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>