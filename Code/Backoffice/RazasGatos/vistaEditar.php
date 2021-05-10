<?php 

require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<h1>Formulario de edicion de Raza</h1>

<form action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($raza) ?>" name="Id" id="Id">
    <label for="razaGato">Raza Gato</label>
    <input type="text" id="razaGato" name="razaGato" value="<?php mostrarCampoTexto($raza,'Nombre') ?>" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>