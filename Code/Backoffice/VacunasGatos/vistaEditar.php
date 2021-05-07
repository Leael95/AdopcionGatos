<?php 
require "controller.php";
?>

<h1>Formulario de edicion de Vacunas</h1>

<form action="vistaEditar.php" method="post">
    <label for="nombreVacuna">Nombre vacuna</label>
    <input type="text" id="nombreVacuna" name="nombreVacuna" />
    </br>
    <label for="descripcionVacuna">Descripcion de la vacuna</label>
    <input type="text" id="descripcionVacuna" name="descripcionVacuna" />
    </br>
    </br>
    <input type="submit" value="Guardar" formmethod="post" />
    <input type="submit" value="Eliminar" />
</form>
