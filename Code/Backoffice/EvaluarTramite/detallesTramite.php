<?php 

require "controller.php";
procesarRequestDetallesTramite();
$detallesDelTramite = mysqli_fetch_assoc($detallesTramite);

?>

<table>
    <thead>
        <th>Id</th>
        <th>Numero de Tramite</th>
        <th>Nombre del Postulante</th>
        <th>Apellido del Postulante</th>
        <th>Estado del Tramite de Adopcion</th>
        <th>Nombre del Gato</th>
        <th>Fecha del Tramite</th>
        <th>Telefono</th>
        <th>Mail</th>
        <th>Direccion</th>
    </thead>
    <tbody>
            <tr>
                <td><?php echo $detallesDelTramite["Id"] ?></td>
                <td><?php echo $detallesDelTramite["NroTramite"] ?></td>
                <td><?php echo $detallesDelTramite["NombrePostulante"] ?></td>
                <td><?php echo $detallesDelTramite["ApellidoPostulante"] ?></td>
                <td><?php echo $detallesDelTramite["NombreEstado"] ?></td>
                <td><?php echo $detallesDelTramite["NombreGato"] ?></td>
                <td><?php echo $detallesDelTramite["FechaEstado"] ?></td>
                <td><?php echo $detallesDelTramite["TelefonoPostulante"] ?></td>
                <td><?php echo $detallesDelTramite["Mail"] ?></td>
                <td><?php echo $detallesDelTramite["Direccion"] ?></td>
            </tr>
    </tbody>
</table>

<form id="formularioDetalle" name="formularioDetalle" action="detallesTramite.php" method="POST">

    <input id="idTramite" name="idTramite" type="hidden" value="<?php echo $detallesDelTramite["Id"] ?>">

    <select name="idEstadoDelTramite" id="idEstadoDelTramite">
        <?php while($listar = mysqli_fetch_assoc($listadoEstadosTramite)) : ?>
            <option value="<?php echo $listar["Id"] ?>"><?php echo $listar["Nombre"] ?></option>
        <?php endwhile; ?>
    </select>
    
    <input type="submit" value="Modificar">

</form>