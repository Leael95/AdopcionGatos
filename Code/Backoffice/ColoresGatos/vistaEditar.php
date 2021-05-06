<?php 
require "controller.php";
?>

<h1>Formulario de edicion</h1>

<form action="vistaEditar.php" method="post">
    <label for="nombreColor">Color Gato</label>
    <input type="text" id="nombreColor" name="nombreColor" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>
