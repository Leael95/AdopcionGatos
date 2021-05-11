<?php

require "../../Library/Database/database.php";
$ETAG = null;
$esModificacion = false;

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
            global $ETAG;
            global $esModificacion;
            $idETAG = $_GET['Id'];
            $esModificacion = true;
            $ETAG = traerPorId($idETAG);
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
            $idETAG = $_GET['Id'];
            eliminar($idETAG);
        }
    }
}

// ---------------------------------------------------------------------------------------------------------------------------

function crear() {
    $estadosTramiteAdopcion = $_POST['estadosTramiteAdopcion'];
    ejecutarSql("INSERT INTO estadostramiteadopcion (Nombre) VALUES ('{$estadosTramiteAdopcion}')");
}

// ---------------------------------------------------------------------------------------------------------------------------

function modificar() {
    $idETAG = $_POST['Id'];
    $ETAG = traerPorId($idETAG);
    $ETAG['Nombre'] = $_POST['estadosTramiteAdopcion'];
    ejecutarSql("UPDATE estadostramiteadopcion SET Nombre = '{$ETAG['Nombre']}' WHERE Id = {$idETAG}");
}

// ---------------------------------------------------------------------------------------------------------------------------

function eliminar($idETAG){
    ejecutarSql("DELETE FROM estadostramiteadopcion WHERE Id = {$idETAG}");
}

// ---------------------------------------------------------------------------------------------------------------------------
