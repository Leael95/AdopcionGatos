<?php 
require "controller.php";
?>

<h1>Formulario de edicion Estados Gatos</h1>

<form action="vistaEditar.php" method="post">
    <label for="nombreEstado">Nombre Estado</label>
    <input type="text" id="nombreEstado" name="nombreEstado" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>