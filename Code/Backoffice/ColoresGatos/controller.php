<?php

require "../../Library/Database/database.php";
$color = null;
$esModificacion = false;

// ---------------------------------------------------------------------------------------------------------------------------

function listar() {
    $resultado = ejecutarSql("SELECT * FROM coloresgatos");
    return $resultado;
    // $osiosi = mysqli_fetch_assoc($resultado);
    // echo $osiosi[0]['nombre'];
    // var_dump($osiosi);
    
}

// ---------------------------------------------------------------------------------------------------------------------------

function traerPorId($id) {
    $resultado = ejecutarSql("SELECT * FROM coloresgatos WHERE Id = {$id}");
    return $resultado->fetch_assoc();
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        // Obtener Query
        if(isset($_GET['Id'])) {
            global $color;
            global $esModificacion;
            $idColor = $_GET['Id'];
            $esModificacion = true;
            $color = traerPorId($idColor);
        } 
    }
    if($metodo == 'POST') {
        if(isset($_POST['Id']) && $_POST['Id'] != null) {
            modificar();
        } else {
            crear();
        }
        header("Location: vistaListado.php");
        exit;
    }
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarBaja() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        if(isset($_GET['Id'])) {
            $idColor = $_GET['Id'];
            eliminar($idColor);
        }
    }
}

// ---------------------------------------------------------------------------------------------------------------------------

function crear() {
    $nombreColor = $_POST['nombreColor'];
    ejecutarSql("INSERT INTO coloresgatos (Nombre) VALUES ('{$nombreColor}')");
}

// ---------------------------------------------------------------------------------------------------------------------------

function modificar() {
    $idColor = $_POST['Id'];
    $color = traerPorId($idColor);
    $color['Nombre'] = $_POST['nombreColor'];
    ejecutarSql("UPDATE coloresgatos SET Nombre = '{$color['Nombre']}' WHERE Id = {$idColor}");
}

// ---------------------------------------------------------------------------------------------------------------------------

function eliminar($idColor){
    ejecutarSql("DELETE FROM coloresgatos WHERE Id = {$idColor}");
}

// ---------------------------------------------------------------------------------------------------------------------------
