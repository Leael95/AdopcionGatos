<?php // --------------------------------------------

require "controller.php";
$listadoEstadoTramiteAdopcion = listar();

// -------------------------------------------------- ?> 
<script src="controller.js"></script>

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear" id="formularioAlta" onclick="mostrarFormularioAlta()">

<br>
<br>

<table>
    <head>
        <th>Estado Tramite Adopcion</th>
        <th>Acciones</th>
    </head>
    <body>
    <?php while($estadoTramiteAdopcionGato = mysqli_fetch_assoc($listadoEstadoTramiteAdopcion)) : ?>
        <tr>
            <td>
                <?php echo $estadoTramiteAdopcionGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar" onclick="mostrarFormularioModificarETAG(<?php echo $estadoTramiteAdopcionGato['Id']?>)">
                <input type="button" value="Eliminar" onclick="eliminar(<?php echo $estadoTramiteAdopcionGato['Id']?>)">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>