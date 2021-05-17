<?php 
    require "controller.php";
    procesarRequest();
?>

<h1>Vista Editar Gatos</h1>

<form id="formularioGatos" action="vistaEditar.php" method="post">
    <label for="nombreGato">Nombre</label>
    <input id="nombreGato" name="nombreGato" type="text"> </br>

    <label for="edadGato">Edad</label>
    <input id="edadGato" name="edadGato" type="text"></br>

    <label for="pesoGato">Peso</label>
    <input id="pesoGato" name="pesoGato" type="text"></br>

    <label for="idRaza">Raza</label>
    <input id="idRaza" name="idRaza" type="number"></br>

    <label for="idColor">Color</label>
    <input id="idColor" name="idColor" type="number"></br>

    <label for="idEstadogato">Estado Gato</label>
    <input id="idEstadoGato" name="idEstadoGato" type="number"></br>

    <label for="pathFotos">Foto</label>
    <input id="pathFotos" name="pathFotos" type="text"></br></br>

    <input id="botonEnviar" type="submit" value="Enviar"></br>
    
</form>