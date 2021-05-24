<?php 
require "../../Library/Database/database.php";

$gato = null;
$vacunasXGato = array();

$listadoVacunas = null;

//------------------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $existeId = array_key_exists('id',$_GET);
        if($existeId == true) {
            global $gato;
            global $vacunasXGato;

            $idGato = $_GET['id'];

            $gato = traerGatoId($idGato);
            $vacunasXGato = traerVacunasXIdGato($idGato);
            var_dump($vacunasXGato);
        } else {
            global $listadoVacunas;

            // $listadoVacunas = listarVacunas();
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {   
        $existeId = array_key_exists('id',$_POST);
        if($existeId == true && $_POST['id'] != null) {
            modificarGato();
            // vistaListado();
        } else {
            crearGato();
            vistaListado();
        }
    }
}

//------------------------------------------------------------------------------------------------------------------------------------

function vistaListado() {
    header('Location: vistaListado.php');
}

//------------------------------------------------------------------------------------------------------------------------------------

function traerGatoId($id) {
    $resultado = ejecutarSql("SELECT * FROM gatos WHERE Id = {$id}");

    $gatoSeleccionado = $resultado->fetch_assoc();

    return $gatoSeleccionado;
}

//------------------------------------------------------------------------------------------------------------------------------------

function traerVacunasXIdGato($id) {
    $resultadoVacunasXGatos = ejecutarSql("SELECT * FROM vacunasxgatos WHERE IdGato = {$id}");

    $vacunasSeleccionadas = $resultadoVacunasXGatos->fetch_all(MYSQLI_ASSOC);

    return $vacunasSeleccionadas;
}

//------------------------------------------------------------------------------------------------------------------------------------

function tildarSiFueAplicada($idVacuna, $vacunasAplicadas) {

    foreach($vacunasAplicadas as $vacunaAplicada) {

        if($idVacuna == $vacunaAplicada['IdVacuna']) {
            echo ' checked ';
            break;
        }
    }
}

//------------------------------------------------------------------------------------------------------------------------------------

function mostrarFechaSiFueAplicada($idVacuna, $vacunasAplicadas) {
    foreach($vacunasAplicadas as $vacunaAplicada) {

        if($idVacuna == $vacunaAplicada['IdVacuna']) {
            echo "{$vacunaAplicada['Fecha']}";
            break;
        }
    }
}

//------------------------------------------------------------------------------------------------------------------------------------

function listarRazas() {
    $resultado = ejecutarSql("SELECT * FROM razasgatos");

    return $resultado;
}

//------------------------------------------------------------------------------------------------------------------------------------

function listarColores() {
    $resultado = ejecutarSql("SELECT * FROM coloresgatos");

    return $resultado;
}

//------------------------------------------------------------------------------------------------------------------------------------

function listarEstados() {
    $resultado = ejecutarSql("SELECT * FROM estadosgato");

    return $resultado;
}

//------------------------------------------------------------------------------------------------------------------------------------

function listarVacunas() {
    $resultado = ejecutarSql("SELECT * FROM vacunas");

    return $resultado;
}

//------------------------------------------------------------------------------------------------------------------------------------

function listarGatos() {
    $resultado = ejecutarSql("SELECT * FROM Gatos");

    return $resultado;
}


//------------------------------------------------------------------------------------------------------------------------------------

function crearGato() {

    $nombreGato = $_POST['nombreGato'];
    $edadGato = $_POST['edadGato'];
    $pesoGato = $_POST['pesoGato'];
    $idRaza = $_POST['idRaza'];
    $idColor = $_POST['idColor'];
    $idEstadoGato = $_POST['idEstadoGato'];
    $pathFotos = $_POST['pathFotos'];

    try {
        iniciarTransaccion();

        $idGatoCreado = insertAndRetrieveId("INSERT INTO Gatos (Nombre, Edad, Peso, IdRaza, IdColor, IdEstadoGato, PathFotos) VALUES ('{$nombreGato}',{$edadGato},{$pesoGato},{$idRaza},{$idColor},{$idEstadoGato},'{$pathFotos}')");

        $fechaVacunasGato = $_POST['fechaVacunas'];
        $vacunasGato = $_POST['vacunas'];

        crearVacunasPorGatos($vacunasGato, $fechaVacunasGato, $idGatoCreado);

        commitearTransaccion();
    } catch (Exception $e) {
        rollbackTransaccion();
    }

}

//------------------------------------------------------------------------------------------------------------------------------------

function crearVacunasPorGatos($vacunasGato, $fechaVacunas, $idDelGato) {
    foreach ($vacunasGato as $idVacuna) {
        $fechaVacuna = $fechaVacunas[$idVacuna];

        ejecutarSql("INSERT INTO vacunasxgatos (IdVacuna, IdGato, Fecha) VALUES ({$idVacuna}, {$idDelGato}, '{$fechaVacuna}')");
    }
}


//------------------------------------------------------------------------------------------------------------------------------------

function modificarGato() {
    $id = $_POST['id'];
    $nombreGato = $_POST['nombreGato'];
    $edadGato = $_POST['edadGato'];
    $pesoGato = $_POST['pesoGato'];
    $idRaza = $_POST['idRaza'];
    $idColor = $_POST['idColor'];
    $idEstadoGato = $_POST['idEstadoGato'];
    $pathFotos = $_POST['pathFotos'];

    // ejecutarSql("UPDATE Gatos SET Nombre = '{$nombreGato}', Edad = {$edadGato}, Peso = {$pesoGato}, IdRaza = {$idRaza}, IdColor = {$idColor}, IdEstadoGato = {$idEstadoGato}, PathFotos = '{$pathFotos}' WHERE Id = {$id}");
    try {
        iniciarTransaccion();

            ejecutarSql("UPDATE Gatos SET Nombre = '{$nombreGato}', Edad = {$edadGato}, Peso = {$pesoGato}, IdRaza = {$idRaza}, IdColor = {$idColor}, IdEstadoGato = {$idEstadoGato}, PathFotos = '{$pathFotos}' WHERE Id = {$id}");
            ejecutarSql("DELETE FROM vacunasxgatos WHERE IdGato={$id}");

            $fechaVacunasGato = $_POST['fechaVacunas'];
            $vacunasGato = $_POST['vacunas'];
    
            crearVacunasPorGatos($vacunasGato, $fechaVacunasGato, $id);

        commitearTransaccion();
    } catch (Exception $ex) {
        rollbackTransaccion();
    }
}

//------------------------------------------------------------------------------------------------------------------------------------

    function eliminarGato() {
        $id = $_POST['id'];

        ejecutarSql("DELETE FROM Gatos WHERE Id = {$id}");
    }
