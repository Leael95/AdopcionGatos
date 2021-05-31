<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="controller.js"></script>

<h1>Formulario de edicion de Colores</h1>

<form id="formEditarColorGato" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($color) ?>" name="Id" id="Id">
    <label for="nombreColor">Color Gato</label>
    <input id="nombreColor" type="text" name="nombreColor" value="<?php mostrarCampoTexto($color,'Nombre') ?>" 
        data-parsley-trigger="keyup"
        required="" 
        data-parsley-maxlength="50" />
    <span id="msjErrornombreColor" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input id="btnGuardar" type="submit" value="Guardar"  />
    <?php 
    if($esModificacion == true){
        $idColor = obtenerId($color);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idColor})'/>";
    }
    ?>
</form>

<script>
  $('#formEditarColorGato').parsley();
</script>