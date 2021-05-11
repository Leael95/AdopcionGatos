<?php 

require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="controller.js"></script>

<h1>Formulario de edicion de ColoresTesteoNumero2ParaSaberSiFuncionaEsto</h1>

<form id="formEditarColorGato" action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($color) ?>" name="Id" id="Id">
    <label for="nombreColor">Color Gato</label>
    <input type="text" id="nombreColor" name="nombreColor" value="<?php mostrarCampoTexto($color,'Nombre') ?>" />
    <span id="msjErrorNombreColor" class="msjErrorInvisible">Este campo es obligatorio</span>
    </br>
    </br>
    <input type="button" value="Guardar" onclick="validarDatos()" />
    <?php 
    if($esModificacion == true){
        $idColor = obtenerId($color);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idColor})'/>";
    }
    ?>
</form>