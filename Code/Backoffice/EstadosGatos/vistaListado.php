<?php // --------------------------------------------

require "controller.php";
$listadoEstados = listar();

// -------------------------------------------------- ?>
<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<script src="controller.js"></script>

<body class="p-3 mb-2 bg-dark text-white">
    <div class="container-fluid d-flex flex-column align-items-center">
        <h1>Vista Listado</h1>

        <br>

        <input type="button" value="Crear" id="formularioEstadoGatos" class="btn btn-primary" onclick="mostrarFormularioAltaEstados()">

        <br>
        <br>

        <table>
            <head>
                <th class="text-center text-uppercase">Estado</th>
                <th class="text-center text-uppercase">Acciones</th>
            </head>
            <?php while($estadosGato = mysqli_fetch_assoc($listadoEstados)) : ?>
                <tr>
                    <td class="text-center p-2">
                        <?php echo $estadosGato['Nombre'] ?>         
                    </td>
                    <td>
                        <input type="button" value="Modificar" class="btn btn-warning" onclick="mostrarFormularioModificarEstados(<?php echo $estadosGato['Id']?>)">
                        <input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminar(<?php echo $estadosGato ['Id']?>)">
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>