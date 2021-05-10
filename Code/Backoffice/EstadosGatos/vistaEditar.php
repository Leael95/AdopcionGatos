<?php 

require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<h1>Formulario de edicion Estados Gatos</h1>

<form action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($estado) ?>" name="Id" id="Id">
    <label for="estadosGato">Estado del Gato</label>
    <input type="text" id="estadosGato" name="estadosGato" value="<?php mostrarCampoTexto($estado,'Nombre') ?>" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>