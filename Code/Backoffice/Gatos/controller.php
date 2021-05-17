<?php 
require "../../Library/Database/database.php";

$gato = null;

//------------------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $existeId = array_key_exists('id',$_GET);
        if($existeId == true) {
            global $gato;

            $idGato = $_GET['id'];
            $gato = traerGatoId($idGato);
            
            header('Location: vistaEditar.php');
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $existeId = array_key_exists('id',$_POST);
        if($existeId == true) {
            modificarGato();
            vistaListado();
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
    $resultado = ejecutarSql("SELECT * FROM Gatos WHERE Id = {$id}");
    $gatoSeleccionado = mysqli_fetch_row($resultado);

    return $gatoSeleccionado;
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

    ejecutarSql("INSERT INTO Gatos (Nombre, Edad, Peso, IdRaza, IdColor, IdEstadoGato, PathFotos) VALUES ('{$nombreGato}',{$edadGato},{$pesoGato},{$idRaza},{$idColor},{$idEstadoGato},'{$pathFotos}')");
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

    ejecutarSql("UPDATE Gatos SET Nombre = '{$nombreGato}', Edad = {$edadGato}, Peso = {$pesoGato}, IdRaza = {$idRaza}, IdColor = {$idColor}, IdEstadoGato = {$idEstadoGato}, PathFotos = '{$pathFotos}' WHERE Id = {$id}");
}

//------------------------------------------------------------------------------------------------------------------------------------

function eliminarGato() {
    $id = $_POST['id'];

    ejecutarSql("DELETE FROM Gatos WHERE Id = {$id}");
}
