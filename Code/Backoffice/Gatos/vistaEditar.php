<?php 
    require "../../Library/formHelpers.php";
    require "controller.php";

    $listadoRazas = listarRazas();
    $listadoColores = listarColores();
    $listadoEstados = listarEstados();
    $listadoVacunas = listarVacunas();

    procesarRequest();
?>

<link rel="stylesheet" href="../Assets/Styles/formStyles.css">
<script src="../Assets/Library/Vendors/jquery-3.6.0.js"></script>
<script src="../Assets/Library/Vendors/parsley.min.js"></script>
<script src="controller.js"></script>

<h1>Vista Editar Gatos</h1>

<form id="formularioGatos" action="vistaEditar.php" method="post">

    <input id="id" type="hidden" name="id" value=<?php mostrarId($gato); ?>>

    <label for="nombreGato">Nombre</label>
    <input id="nombreGato" name="nombreGato" type="text"
        data-parsey-trigger="keyup"
        required=""
        data-parsley-maxlength="50"
        value="<?php mostrarCampoTexto($gato, 'Nombre'); ?>"
    > </br></br>

    <label for="edadGato">Edad</label>
    <input id="edadGato" name="edadGato" type="number"
        data-parsey-trigger="keyup"  
        required="" 
        data-parsley-maxlength="2" 
        value="<?php mostrarCampoTexto($gato, 'Edad'); ?>"
    ></br></br>

    <label for="pesoGato">Peso</label>
    <input id="pesoGato" name="pesoGato" type="number" 
        data-parsey-trigger="keyup"  
        required="" 
        data-parsley-maxlength="3" 
    value="<?php mostrarCampoTexto($gato, 'Peso'); ?>"></br></br>

    <label for="idRaza">Raza</label>
    <select id="idRaza" name="idRaza">
        <?php while ($razaGato = mysqli_fetch_assoc($listadoRazas)) : ?>
            <option 
                value="<?php echo $razaGato['Id'] ?>" 
                <?php if($gato != null && $razaGato['Id'] == $gato['IdRaza']) {
                    echo ' selected';
                } ?> >
                <?php echo $razaGato['Nombre']  ?>
            </option>
        <?php endwhile; ?>
    </select> </br></br>

    <label for="idColor">Color</label>
    <select id="idColor" name="idColor">
        <?php while ($colorGato = mysqli_fetch_assoc($listadoColores)) : ?>
            <option 
                value="<?php echo $colorGato['Id'] ?>" 
                <?php if($gato != null && $colorGato['Id'] == $gato['IdColor']) {
                    echo ' selected';
                } ?> >
                <?php echo $colorGato['Nombre'] ?>
            </option>
        <?php endwhile; ?>
    </select> </br></br>


    <label for="pathFotos">Foto</label>
    <input id="pathFotos" name="pathFotos" type="text" 
        data-parsey-trigger="keyup"
        required=""
        data-parsley-maxlength="50"
    value="<?php mostrarCampoTexto($gato, 'PathFotos'); ?>"></br></br>

    <select id="idEstadoGato" name="idEstadoGato" disabled 
        <?php
            if($gato == null) {
                $resultado = ejecutarSql("SELECT * FROM estadosgato WHERE Id = 1");
                echo " style=visibility:hidden;";
            }
        ?> 
    >
        <?php while ($estadoGato = mysqli_fetch_assoc($listadoEstados)) : ?>
            <option
                value="<?php echo $estadoGato['Id'] ?>"
                <?php if($gato != null && $estadoGato['Id'] == $gato['IdEstadoGato']) {
                    echo ' selected';
                } ?> >
                <?php echo $estadoGato['Nombre'] ?>
            </option>
        <?php endwhile; ?>
    </select> </br></br>

    <h3>Vacunas</h3>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Vacuna</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php while($vacuna = mysqli_fetch_assoc($listadoVacunas)) : ?>
                <tr>
                    <td>
                        <input id="vacunas[<?php echo $vacuna['Id']?>]" name="vacunas[<?php echo $vacuna['Id']?>]"  
                            onchange="checkboxChecked(<?php echo $vacuna['Id']?>)"
                            type="checkbox" 
                            value="<?php echo $vacuna['Id'] ?>" 
                            <?php tildarSiFueAplicada($vacuna['Id'],$vacunasXGato) ?> />
                    </td>
                    <td><?php echo $vacuna['Nombre']; ?></td>
                    <td>
                        <input id="fechaVacunas[<?php echo $vacuna['Id']?>]" name="fechaVacunas[<?php echo $vacuna['Id']?>]" type="date" 
                            value="<?php mostrarFechaSiFueAplicada($vacuna['Id'],$vacunasXGato) ?>">
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <input id="botonEnviar" type="submit" value="Enviar"></br>
    
</form>

<script>
    $('#formularioGatos').parsley();
</script>