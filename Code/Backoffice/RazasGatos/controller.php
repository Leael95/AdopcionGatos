<?php

require "../../Library/Database/database.php";
$raza = null;

// ---------------------------------------------------------------------------------------------------------------------------

function listar() {
    $resultado = ejecutarSql("SELECT * FROM razasgatos");
    return $resultado;
    // $osiosi = mysqli_fetch_assoc($resultado);
    // echo $osiosi[0]['nombre'];
    // var_dump($osiosi);
    
}

// ---------------------------------------------------------------------------------------------------------------------------

function traerPorId($id) {
    $resultado = ejecutarSql("SELECT * FROM razasgatos WHERE Id = {$id}");
    return $resultado->fetch_assoc();
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        // Obtener Query
        if(isset($_GET['Id'])) {
            global $raza;
            $idRaza = $_GET['Id'];
            $raza = traerPorId($idRaza);
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
    $razaGato = $_POST['razaGato'];
    ejecutarSql("INSERT INTO razasgatos (Nombre) VALUES ('{$razaGato}')");
}

// ---------------------------------------------------------------------------------------------------------------------------

function modificar() {
    $idRaza = $_POST['Id'];
    $raza = traerPorId($idRaza);
    $raza['Nombre'] = $_POST['razaGato'];
    ejecutarSql("UPDATE razasgatos SET Nombre = '{$raza['Nombre']}' WHERE Id = {$idRaza}");
}

// ---------------------------------------------------------------------------------------------------------------------------

function eliminar(){

}

// ---------------------------------------------------------------------------------------------------------------------------
