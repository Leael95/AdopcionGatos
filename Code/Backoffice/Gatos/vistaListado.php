<?php 
require "controller.php";

$listadoGatos = listarGatos();
?>

<script src="controller.js"></script>

<h1>Listado de Gatos</h1>

<input type="button" value="Crear" onclick="vistaCrear()">
<table>
    <thead>
        <td>Nombre</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        <?php while($gato = mysqli_fetch_array($listadoGatos)) : ?>
            <tr>
                <td><?php echo $gato['Nombre'] ?></td>
                <td>
                    <input type="button" value="Modificar">
                    <input type="button" value="Eliminar">
                </td>
            </tr> 
        <?php endwhile; ?>
    </tbody>
</table>