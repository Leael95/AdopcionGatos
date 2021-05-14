<?php // --------------------------------------------

require "controller.php";
$listadoColores = listar();

// -------------------------------------------------- ?> 
<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<script src="controller.js"></script>


   <div class="container-fluid d-flex flex-column align-items-center">
    <h1 class="text-center">Vista Listado</h1>

        <br>

        <input class="btn btn-primary" type="button" value="Crear" id="formularioAlta" onclick="mostrarFormularioAlta()">

        <br>
        <br>

        <table>
        <head>
            <th class="text-center">Color</th>
            <th class="text-center">Acciones</th>
        </head>
        <body>
        <?php while($colorGato = mysqli_fetch_assoc($listadoColores)) : ?>
            <tr>
                <td>
                    <?php echo $colorGato['Nombre'] ?>         
                </td>
                <td>
                    <input class="btn btn-warning" type="button" value="Modificar" onclick="mostrarFormularioModificarColor(<?php echo $colorGato['Id']?>)">
                    <input class="btn btn-danger" type="button" value="Eliminar" onclick="eliminar(<?php echo $colorGato['Id']?>)">
                </td>
            </tr>
        <?php endwhile; ?>
        </body>
        </table>
   </div>