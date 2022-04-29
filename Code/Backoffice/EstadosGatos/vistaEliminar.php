<?php 
 require "controller.php";
 procesarBaja();
?>

<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<script src="controller.js"></script>

<body class="p-3 mb-2 bg-dark text-white">

    <div class="container-fluid d-flex flex-column align-items-center">
        <h1>Registro Eliminado Correctamente</h1>

        <input type="button" value="Volver al Listado" class="btn btn-primary" onclick="mostrarListado()">
    </div>

</body>