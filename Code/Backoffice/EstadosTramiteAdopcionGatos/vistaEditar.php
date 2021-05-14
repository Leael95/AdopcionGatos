<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="controller.js"></script>

<h1>Formulario de edicion Estado Tramite Adopcion</h1>

<form id="formEditarETAG" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($ETAG) ?>" name="Id" id="Id">
    <label for="estadosTramiteAdopcion">Estado Tramite Adopcion Gato</label>
    <input type="text" id="estadosTramiteAdopcion" name="estadosTramiteAdopcion" value="<?php mostrarCampoTexto($ETAG, 'Nombre')?>"
        data-parsley-trigger="keyup"
        required=""
        data-parsley-maxlength="3" />
    <span id="msjErrorestadosTramiteAdopcion" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input id="btnGuardar" type="submit" value="Guardar" />
    <?php
    if($esModificacion == true){
        $idETAG = obtenerId($ETAG);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idETAG})'/>";
    }
    ?>
</form>

<script>
$('#formEditarETAG').parsley();
</script>