<?php // --------------------------------------------

require "controller.php";
$listadoEstadoTramiteAdopcion = listar();

// -------------------------------------------------- ?> 
<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<script src="controller.js"></script>

<body class="p-3 mb-2 bg-dark text-white">
    <div class="container-fluid d-flex flex-column align-items-center">
        <h1 class="">Vista Listado</h1>

        <input type="button" value="Crear" id="formularioAlta" class="btn btn-primary" onclick="mostrarFormularioAlta()">

        <table>
            <head>
                <th class="text-center text-uppercase p-1">Estado Tramite Adopcion</th>
                <th class="text-center text-uppercase">Acciones</th>
            </head>
            <body>
            <?php while($estadoTramiteAdopcionGato = mysqli_fetch_assoc($listadoEstadoTramiteAdopcion)) : ?>
                <tr>
                    <td class="text-center">
                        <?php echo $estadoTramiteAdopcionGato['Nombre'] ?>         
                    </td>
                    <td>
                        <input class="btn btn-warning" type="button" value="Modificar" onclick="mostrarFormularioModificarETAG(<?php echo $estadoTramiteAdopcionGato['Id']?>)">
                        <input class="btn btn-danger" type="button" value="Eliminar" onclick="eliminar(<?php echo $estadoTramiteAdopcionGato['Id']?>)">
                    </td>
                </tr>
            <?php endwhile; ?>
            </body>
        </table>
    </div>
</body>