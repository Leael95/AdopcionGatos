<?php 
require "controller.php";
?>

<h1>Formulario de edicion</h1>

<form action="vistaEditar.php" method="post">
    <label for="razaGato">Raza Gato</label>
    <input type="text" id="razaGato" name="razaGato" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>