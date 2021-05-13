<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/formHelpers.js"></script>
<script src="controller.js"></script>

<h1>Formulario de edicion Estado Tramite Adopcion</h1>

<form id="formEditarETAG" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($ETAG) ?>" name="Id" id="Id">
    <label for="estadosTramiteAdopcion">Estado Tramite Adopcion Gato</label>
    <input type="text" id="estadosTramiteAdopcion" name="estadosTramiteAdopcion" value="<?php mostrarCampoTexto($ETAG, 'Nombre')?>" />
    <span id="msjErrorestadosTramiteAdopcion" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input type="button" value="Guardar" onclick="enviar()" />
    <?php
    if($esModificacion == true){
        $idETAG = obtenerId($ETAG);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idETAG})'/>";
    }
    ?>
</form>