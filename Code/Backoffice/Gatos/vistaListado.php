<?php 
require "controller.php";

$listadoGatos = listarGatos();
?>
<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<script src="controller.js"></script>

<div class="container-fluid d-flex flex-column align-items-center   ">

    <h1 class="text-center text-uppercase">Listado de Gatos</h1></br>

    <input class="btn btn-primary" type="button" value="Crear" onclick="vistaCrear()"></br></br>

    <table>
        <thead>
            <th class="text-center text-uppercase">Nombre</td>
            <th class="text-center text-uppercase">Acciones</td>
        </thead>
        <tbody>
            <?php while($gato = mysqli_fetch_array($listadoGatos)) : ?>
                <tr>
                    <td><?php echo $gato['Nombre'] ?></td>
                    <td>
                        <input class="btn btn-warning" type="button" value="Modificar" onclick="vistaModificar(<?php echo $gato['Id'] ?>);">
                        <input class="btn btn-danger" type="button" value="Eliminar" onclick="vistaEliminar(<?php echo $gato['Id'] ?>);">
                    </td>
                </tr> 
            <?php endwhile; ?>
        </tbody>
    </table>

</div>