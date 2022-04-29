<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="../Assets/Library/formHelpers.js"></script>
<script src="controller.js"></script>

<body class="p-3 mb-2 bg-dark text-white">
  <h1 class="text-center">Formulario de edicion Estados Gatos</h1>

  <form id="formEditarEstadosGato" action="vistaEditar.php" method="post" class="container-fluid d-flex flex-column align-items-center">
      <input type="hidden" value="<?php mostrarId($estado) ?>" name="Id" id="Id">
      <label for="estadosGato" class="h5">Estado del Gato</label>
        <input type="text" id="estadosGato" name="estadosGato" value="<?php mostrarCampoTexto($estado,'Nombre') ?>" 
        data-parsley-trigger="keyup" 
        required="" 
        data-parsley-maxlength="50" 
        />
      <span id="msjErrorestadosGato" class="msjErrorInvisible">Este campo es obligatorio</span>

      <div>
        <input id="btnGuardar" type="submit" class="btn btn-primary" value="Guardar" />
        <?php
        if($esModificacion == true) {
            $idEstado = obtenerId($estado);
            echo "<input type='button' value='Eliminar' class='btn btn-danger' onclick='eliminar({$idEstado})'/>";
        }
        ?>
      </div>
  </form>
</body>

<script>
  $('#formEditarEstadosGato').parsley();
</script>