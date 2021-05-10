<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<h1>Formulario de edicion de Vacunas</h1>

<form action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($vacuna) ?>" name="Id" id="Id">
    <label for="nombreVacuna">Nombre vacuna</label>
    <input type="text" id="nombreVacuna" name="nombreVacuna" value="<?php mostrarCampoTexto($vacuna,'Nombre') ?>" />
    </br>
    <label for="descripcionVacuna">Descripcion de la vacuna</label>
    <input type="text" id="descripcionVacuna" name="descripcionVacuna" value ="<?php mostrarCampoTexto($vacuna,'Descripcion') ?>"/>
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>
