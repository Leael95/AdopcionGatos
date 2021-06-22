<?php 

require "controller.php";
procesarRequest();

?>

<script src="controller.js"></script>
<link rel="stylesheet" href="../Assets/Styles/Vendors/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/Styles/formStyles.css">

<h1>Evaluacion de Tramite de Adopcion</h1>

<form action="">

    <label for="estadoTramite">Estado de Tramite</label>
    <select id="estadoTramite" name="estadoTramite">
        <?php while($listarEstadosTramite = mysqli_fetch_assoc($listadoEstadosTramite)) : ?>
            <option value="<?php echo $listarEstadosTramite["Id"]?>"><?php echo $listarEstadosTramite["Nombre"]?></option>
        <?php endwhile; ?>
    </select></br></br>

    <label for="nroTramite">Numero de Tramite</label>
    <input id="nroTramite" name="nroTramite" type="number"></br></br>

    <label for="fechaTramiteDesde">Fecha de inicio</label>
    <input id="fechaTramiteDesde" name="fechaTramiteDesde" type="date"></br></br>

    <label for="fechaTramiteHasta">Fecha de fin</label>
    <input id="fechaTramiteHasta" name="fechaTramiteHasta" type="date"></br></br>

    <input type="button" value="Buscar" onclick="filtrar()">
    <input type="button" value="Mostrar todo" onclick="limpiarTodo()">

</form>

<?php if(mysqli_num_rows($listadoDeTramites) == 0) { ?>
    <div>
        <p>No hay resultados wachin</p>    
    </div>
<?php } else { ?>

<table>
    <thead>
        <th></th>
        <th>Nro de Tramite</th>
        <th>Nombre y Apellido</th>
        <th>Estado del Tramite</th>
        <th>Nombre del Gato</th>
    </thead>
    <tbody>
        <?php while($tramiteAdopcion = mysqli_fetch_assoc($listadoDeTramites)) : ?>
        <tr>
            <td><input id="btnVerDetalle<?php echo $tramiteAdopcion["Id"]?>" name="btnVerDetalle<?php echo $tramiteAdopcion["Id"]?>" type="button" value="Ver Detalles" 
            onclick="verDetalleTramite(<?php echo $tramiteAdopcion["Id"] ?>)"></td>
            <td><?php echo $tramiteAdopcion["NroTramite"] ?></td>
            <td><?php echo $tramiteAdopcion["NombrePostulante"]?> <?php echo $tramiteAdopcion["ApellidoPostulante"] ?></td>
            <td><?php echo $tramiteAdopcion["NombreEstado"]?></td>
            <td><?php echo $tramiteAdopcion["NombreGato"]?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php } ?>