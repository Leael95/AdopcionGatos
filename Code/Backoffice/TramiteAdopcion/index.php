<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php

require "controller.php";

procesarRequest();

?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="controller.js"></script>

<h1>Solicitar trámite de adopción</h1>

<form id="formSolicitarTramiteAdopción" data-parsley-validate="" method="post" action="index.php">

<label for="nroDeTramite">Numero de Tramite</label>
<input id="nroDeTramite" name="nroDeTramite" type="text" 
    required="" 
    data-parsley-trigger="keyup" 
    data-parsley-required-message="Este campo es obligatorio"> <br><br>

<label for="nombrePostulante">Nombre</label>
<input id="nombrePostulante" name="nombrePostulante" type="text" value="" 
    data-parsley-trigger="keyup" 
    required=""
    data-parsley-required-message="Este campo es obligatorio"  />
    </br>
    </br>

<label for="apellidoPostulante">Apellido</label>
<input id="apellidoPostulante" name="apellidoPostulante" type="text" value=""
    data-parsley-trigger="keyup"
    required=""
    data-parsley-required-message="Este campo es obligatorio" />
    </br>
    </br>

<label for="telefonoPostulante">Teléfono</label>
<input id="telefonoPostulante" name="telefonoPostulante" type="text" value=""
    data-parsley-trigger="keyup"
    required=""
    data-parsley-required-message="Este campo es obligatorio"
    data-parsley-type="digits" />
    </br>
    </br>

<label for="emailPostulante">Direccion de correo electrónico</label>
<input id="emailPostulante" name="emailPostulante" type="text" value=""
    data-parsley-trigger="keyup"
    required=""
    data-parsley-required-message="Este campo es obligatorio"
    data-parsley-type="email" />
    </br>
    </br>

<label for="direccionPostulante">Direccion de domicilio</label>
<input id="direccionPostulante" name="direccionPostulante" type="text" value=""
    data-parsley-trigger="keyup"
    required=""
    data-parsley-required-message="Este campo es obligatorio" />
    </br>
    </br>

<h3>Gatos</h3>
<table id="gatosEnAdopcion">
    <thead>
        <tr>
            <th></th>
            <th>Gato</th>
            <th>Raza</th>
            <th>Color</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <?php while($gato = mysqli_fetch_assoc($listadoGatos)) : ?>
        <tr>
            <td>
                <input id="gato[<?php echo $gato['Id'] ?>]" name="gato[<?php echo $gato['Id'] ?>]" 
                type="checkbox"
                data-gatoid="<?php echo $gato['Id']?>"
                value="<?php echo $gato['Id']?>" 
                onchange="onSeleccionarGato(<?php echo $gato['Id'] ?>)">
            </td>
            <td>
                <?php echo $gato['Nombre'] ?>
            </td>
            <td>
                <?php echo utf8_decode($gato['Raza'])  ?>
            </td>
            <td>
                <?php echo $gato['Color'] ?>
            </td>
            <td>
                <?php echo $gato['Edad'] ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

    <input id="botonEnviar" type="submit" value="Enviar">


</form>

<script>
  $('#formEditarGato').parsley();
</script>