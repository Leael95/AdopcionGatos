<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="controller.js"></script>

<h1>Formulario de edicion de Vacunas</h1>

<form id="formEditarVacunas" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($vacuna) ?>" name="Id" id="Id">
    <label for="nombreVacuna">Nombre vacuna</label>
    <input type="text" id="nombreVacuna" name="nombreVacuna" value="<?php mostrarCampoTexto($vacuna,'Nombre') ?>" />
    <span id="msjErrorNombreVacuna" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    <label for="descripcionVacuna">Descripcion de la vacuna</label>
    <input type="text" id="descripcionVacuna" name="descripcionVacuna" value ="<?php mostrarCampoTexto($vacuna,'Descripcion') ?>"/>
    <span id="msjErrorDescripcionVacuna" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input type="button" value="Guardar" onclick="validarDatos()" />
    <?php
    if($esModificacion == true){
        $idVacuna = obtenerId($vacuna);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idVacuna})'/>";
    }
    ?>
</form>
