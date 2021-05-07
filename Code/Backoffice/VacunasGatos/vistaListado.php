<?php // --------------------------------------------

require "controller.php";
$listadoVacunas = listar();

// -------------------------------------------------- ?> 
<script src="controller.js"></script>

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear" id="formularioAltaVacunas" onclick="mostrarFormularioAltaVacunas()">

<br>
<br>

<table>
    <head>
        <th>Vacunas</th>
        <th>Acciones</th>
    </head>
    <body>
    <?php while($vacunasGato = mysqli_fetch_assoc($listadoVacunas)) : ?>
        <tr>
            <td>
                <?php echo $vacunasGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar" onclick="mostrarFormularioModificarVacunas(<?php echo $vacunasGato['Id']?>)">
                <input type="button" value="Eliminar">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>