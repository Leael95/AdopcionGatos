<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="controller.js"></script>

<body class="p-3 mb-2 bg-dark text-white">
    <h1 class="text-center">Formulario de edicion de Colores</h1>

    <form id="formEditarColorGato" action="vistaEditar.php" method="post" class="container-fluid d-flex flex-column align-items-center">
        <input type="hidden" value="<?php mostrarId($color) ?>" name="Id" id="Id">
            <label for="nombreColor" class="h5">Color Gato</label>
            <input id="nombreColor" type="text" class="" name="nombreColor" value="<?php mostrarCampoTexto($color,'Nombre') ?>" 
                data-parsley-trigger="keyup"
                required="" 
                data-parsley-maxlength="50" />
        <span id="msjErrornombreColor" class="msjErrorInvisible">Este campo es obligatorio</span>
     <div>
        <input id="btnGuardar" type="submit" value="Guardar" class="btn btn-primary" />
            <?php 
            if($esModificacion == true){
                $idColor = obtenerId($color);
                echo "<input class='btn btn-danger' type='button' value='Eliminar' onclick='eliminar({$idColor})'/>";
            }
            ?>
     </div>
    </form>
</body>

<script>
  $('#formEditarColorGato').parsley();
</script>