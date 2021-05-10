<?php

require "../../Library/Database/database.php";
$estado = null;

// ---------------------------------------------------------------------------------------------------------------------------

function listar() {
    $resultado = ejecutarSql("SELECT * FROM estadosgato");
    return $resultado;
    // $osiosi = mysqli_fetch_assoc($resultado);
    // echo $osiosi[0]['nombre'];
    // var_dump($osiosi);
    
}

// ---------------------------------------------------------------------------------------------------------------------------

function traerPorId($id) {
    $resultado = ejecutarSql("SELECT * FROM estadosgato WHERE Id = {$id}");
    return $resultado->fetch_assoc();
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        // Obtener Query
        if(isset($_GET['Id'])) {
            global $estado;
            $idEstado = $_GET['Id'];
            $estado = traerPorId($idEstado);
        } 
    }
    if($metodo == 'POST') {
        if(isset($_POST['Id']) && $_POST['Id'] != null){
            modificar();
        } else {
            crear();
        }
        header("Location: vistaListado.php");
        exit;
    }
}

// ---------------------------------------------------------------------------------------------------------------------------

function crear() {
    $estadosGato = $_POST['estadosGato'];
    ejecutarSql("INSERT INTO estadosgato (Nombre) VALUES ('{$estadosGato}')");
}

// ---------------------------------------------------------------------------------------------------------------------------

function modificar() {
    $idEstado = $_POST['Id'];
    $estado = traerPorId($idEstado);
    $estado['Nombre'] = $_POST['estadosGato'];
    ejecutarSql("UPDATE estadosgato SET Nombre = '{$estado['Nombre']}' WHERE Id = {$idEstado}");
}

// ---------------------------------------------------------------------------------------------------------------------------

function eliminar(){

}

// ---------------------------------------------------------------------------------------------------------------------------
