<?php 

require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/formHelpers.js"></script>
<script src="controller.js"></script>

<h1>Formulario de edicion de Raza</h1>

<form id="formEditarRazaGato" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($raza) ?>" name="Id" id="Id">
    <label for="razaGato">Raza Gato</label>
    <input type="text" id="razaGato" name="razaGato" value="<?php mostrarCampoTexto($raza,'Nombre') ?>" />
    <span id="msjErrorrazaGato" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input type="button" value="Guardar" onclick="enviar()" />
    <?php
    if($esModificacion == true) {
        $idRaza = obtenerId($raza);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idRaza})'/>";
    }
    ?>
</form>