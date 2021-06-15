<?php

require "../../Library/Database/database.php";

$listadoGatos;

function procesarRequest() {
    $metodo = $_SERVER["REQUEST_METHOD"];

    if($metodo == "GET") {
        traerGatos();
    }

    if($metodo == "POST") {
        crearTramiteAdopcionGato();
        header("Location: tramiteExitoso.php");
    }
}

function crearTramiteAdopcionGato() {
    $nroDeTramite = $_POST["nroDeTramite"];
    $nombrePostulante = $_POST["nombrePostulante"];
    $apellidoPostulante = $_POST["apellidoPostulante"];
    $telefonoPostulante = $_POST["telefonoPostulante"];
    $emailPostulante = $_POST["emailPostulante"];
    $direccionPostulante = $_POST["direccionPostulante"];
    $idGato = array_key_first($_POST["gato"]);
    $gato = $_POST["gato"][$idGato];

    ejecutarSql("INSERT INTO tramitesadopcion (NroTramite,NombrePostulante,ApellidoPostulante,IdEstadoTramiteAdopcion,IdGato,FechaEstado,TelefonoPostulante,Mail,Direccion) 
    VALUES ('{$nroDeTramite}','{$nombrePostulante}','{$apellidoPostulante}',4,'{$gato}',now(),'{$telefonoPostulante}','{$emailPostulante}','{$direccionPostulante}')");
}

function traerGatos() {
    global $listadoGatos;
    $listadoGatos = ejecutarSql(
    "SELECT Gatos.*,razasgatos.Nombre as Raza, coloresgatos.Nombre as Color 
        FROM Gatos 
            inner join razasgatos on Gatos.idRaza = razasgatos.Id
            inner join coloresgatos on Gatos.idColor = coloresgatos.Id
        WHERE Gatos.IdEstadoGato = 1;");
}


?>

