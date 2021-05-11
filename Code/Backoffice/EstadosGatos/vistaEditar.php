<?php 

require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="controller.js"></script>

<h1>Formulario de edicion Estados Gatos</h1>

<form id="formEditarEstadosGato" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($estado) ?>" name="Id" id="Id">
    <label for="estadosGato">Estado del Gato</label>
    <input type="text" id="estadosGato" name="estadosGato" value="<?php mostrarCampoTexto($estado,'Nombre') ?>" />
    <span id="msjErrorEstadosGato" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input type="button" value="Guardar" onclick="validarDatos()" />
    <?php
    if($esModificacion == true) {
        $idEstado = obtenerId($estado);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idEstado})'/>";
    }
    ?>
</form>