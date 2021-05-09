<?php // --------------------------------------------

require "controller.php";
$listadoColores = listar();

// -------------------------------------------------- ?> 
<script src="controller.js"></script>

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear" id="formularioAlta" onclick="mostrarFormularioAlta()">

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
                <input type="button" value="Modificar" onclick="mostrarFormularioModificarColor(<?php echo $colorGato['Id']?>)">
                <input type="button" value="Eliminar">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>