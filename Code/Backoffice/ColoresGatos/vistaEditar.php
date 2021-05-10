<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>
<script src="controller.js"></script>

<h1>Formulario de edicion de ColoresTesteoNumero2ParaSaberSiFuncionaEsto</h1>

<form action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($color) ?>" name="Id" id="Id">
    <label for="nombreColor">Color Gato</label>
    <input type="text" id="nombreColor" name="nombreColor" value="<?php mostrarCampoTexto($color,'Nombre') ?>" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <?php 
    if($esModificacion == true){
        $idColor = obtenerId($color);
        echo "<input type='button' value='Eliminar' onclick='eliminar({$idColor})'/>";
    }
    ?>
</form>