<?php 
require "controller.php";
?>

<h1>Formulario de edicion</h1>

<form action="vistaEditar.php" method="post">
    <label for="estadoTramiteGato">Estado Tramite Gato</label>
    <input type="text" id="estadoTramiteGato" name="estadoTramiteGato" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>