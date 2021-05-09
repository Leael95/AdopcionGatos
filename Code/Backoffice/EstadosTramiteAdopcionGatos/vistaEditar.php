<?php 
require "controller.php";
require "../../Library/formHelpers.php";
procesarRequest();

?>

<h1>Formulario de edicion Estado Tramite Adopcion</h1>

<form action="vistaEditar.php" method="post">
    <input type="hidden" value="<?php mostrarId($ETAG) ?>" name="Id" id="Id">
    <label for="estadosTramiteAdopcion">Estado Tramite Adopcion Gato</label>
    <input type="text" id="estadosTramiteAdopcion" name="estadosTramiteAdopcion" value="<?php mostrarCampoTexto($ETAG, 'Nombre') ?>" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>