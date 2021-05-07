<?php

require "../../Library/Database/database.php";
procesarRequest();

// ---------------------------------------------------------------------------------------------------------------------------

function listar() {
    $resultado = ejecutarSql("SELECT * FROM estadostramiteadopcion");
    return $resultado;
    // $osiosi = mysqli_fetch_assoc($resultado);
    // echo $osiosi[0]['nombre'];
    // var_dump($osiosi);
    
}

// ---------------------------------------------------------------------------------------------------------------------------

function traerPorId($id) {
    $resultado = ejecutarSql("SELECT * FROM estadostramiteadopcion WHERE Id = {$id}");
    return $resultado->fetch_assoc();
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        // Obtener Query
        if(isset($_GET['Id'])) {
            echo 'modificacion';
        } else {
            echo 'alta';
        }
    }
    if($metodo == 'POST') {
        if(isset($_POST['Id'])) {
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
    $estadosTramiteAdopcion = $_POST['estadosTramiteAdopcion'];
    ejecutarSql("INSERT INTO estadostramiteadopcion (Nombre) VALUES ('{$estadosTramiteAdopcion}')");
}

// ---------------------------------------------------------------------------------------------------------------------------

function modificar() {

}

// ---------------------------------------------------------------------------------------------------------------------------

function eliminar(){

}

// ---------------------------------------------------------------------------------------------------------------------------
