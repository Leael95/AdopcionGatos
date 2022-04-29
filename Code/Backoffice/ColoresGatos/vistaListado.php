<?php // --------------------------------------------

require "controller.php";
$listadoColores = listar();

// -------------------------------------------------- ?> 
<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<script src="controller.js"></script>

<body class="p-3 mb-2 bg-dark text-white">
    <div class="container-fluid d-flex flex-column align-items-center">
        <h1 class="text-center font-weight-bold">Listado de Colores</h1>

        <input class="btn btn-primary" type="button" value="Crear" id="formularioAlta" onclick="mostrarFormularioAlta()"></br>

        <table>
            <th class="text-center text-uppercase p-1">Color</th>
            <th class="text-center text-uppercase">Acciones</th>
        <?php while($colorGato = mysqli_fetch_assoc($listadoColores)) : ?>
            <tr>
                <td class="text-center">
                    <?php echo $colorGato['Nombre'] ?>       
                </td>
                <td>
                    <input class="btn btn-warning" type="button" value="Modificar" onclick="mostrarFormularioModificarColor(<?php echo $colorGato['Id']?>)">
                    <input class="btn btn-danger" type="button" value="Eliminar" onclick="eliminar(<?php echo $colorGato['Id']?>)">
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>
</body>

