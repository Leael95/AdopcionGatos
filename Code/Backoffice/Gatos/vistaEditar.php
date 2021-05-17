<?php 
    require "controller.php";
    $listadoRazas = listarRazas();
    $listadoColores = listarColores();
    $listadoEstados = listarEstados();
    procesarRequest();
?>

<h1>Vista Editar Gatos</h1>

<form id="formularioGatos" action="vistaEditar.php" method="post">
    <label for="nombreGato">Nombre</label>
    <input id="nombreGato" name="nombreGato" type="text"> </br></br>

    <label for="edadGato">Edad</label>
    <input id="edadGato" name="edadGato" type="text"></br></br>

    <label for="pesoGato">Peso</label>
    <input id="pesoGato" name="pesoGato" type="text"></br></br>

    <label for="idRaza">Raza</label>
    <select id="idRaza" name="idRaza">
        <?php while ($razaGato = mysqli_fetch_assoc($listadoRazas)) : ?>
            <option value="<?php echo $razaGato['Id'] ?>"><?php echo $razaGato['Nombre'] ?></option>
        <?php endwhile; ?>
    </select> </br></br>

    <label for="idColor">Color</label>
    <select id="idColor" name="idColor">
        <?php while ($colorGato = mysqli_fetch_assoc($listadoColores)) : ?>
            <option value="<?php echo $colorGato['Id'] ?>"><?php echo $colorGato['Nombre'] ?></option>
        <?php endwhile; ?>
    </select> </br></br>

    <label for="idEstadoGato">Estado Gato</label>
    <select id="idEstadoGato" name="idEstadoGato">
        <?php while ($estadoGato = mysqli_fetch_assoc($listadoEstados)) : ?>
            <option value="<?php echo $estadoGato['Id'] ?>"><?php echo $estadoGato['Nombre'] ?></option>
        <?php endwhile; ?>
    </select> </br></br>

    <label for="pathFotos">Foto</label>
    <input id="pathFotos" name="pathFotos" type="text"></br></br>

    <input id="botonEnviar" type="submit" value="Enviar"></br>
    
</form>