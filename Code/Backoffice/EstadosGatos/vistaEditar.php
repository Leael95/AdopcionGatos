<?php 

require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="../Assets/Library/formHelpers.js"></script>
<script src="controller.js"></script>

<h1>Formulario de edicion Estados Gatos</h1>

<form id="formEditarEstadosGato" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($estado) ?>" name="Id" id="Id">
    <label for="estadosGato">Estado del Gato</label>
    <input type="text" id="estadosGato" name="estadosGato" value="<?php mostrarCampoTexto($estado,'Nombre') ?>" 
      data-parsley-trigger="keyup" 
      required="" 
      data-parsley-maxlength="50" 
    />
    <span id="msjErrorestadosGato" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input id="btnGuardar" type="submit" value="Guardar" />
    <?php
    if($esModificacion == true) {
        $idEstado = obtenerId($estado);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idEstado})'/>";
    }
    ?>
</form>

<script>
  $('#formEditarEstadosGato').parsley();
</script>