<?php // --------------------------------------------

require "controller.php";
$listadoEstados = listar();

// -------------------------------------------------- ?>
<script src="controller.js"></script>

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear" id="formularioEstadoGatos" onclick="mostrarFormularioAltaEstados()">

<br>
<br>

<table>
    <head>
        <th>Estado</th>
        <th>Acciones</th>
    </head>
    <body>
    <?php while($estadosGato = mysqli_fetch_assoc($listadoEstados)) : ?>
        <tr>
            <td>
                <?php echo $estadosGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar" onclick="mostrarFormularioModificarEstados(<?php echo $estadosGato['Id']?>)">
                <input type="button" value="Eliminar">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>