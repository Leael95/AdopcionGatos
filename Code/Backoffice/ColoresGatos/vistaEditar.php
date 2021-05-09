<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<h1>Formulario de edicion de Colores</h1>

<form action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($color) ?>" name="Id" id="Id">
    <label for="nombreColor">Color Gato</label>
    <input type="text" id="nombreColor" name="nombreColor" value="<?php mostrarCampoTexto($color,'Nombre') ?>" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>