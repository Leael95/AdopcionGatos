<?php

require "../../Library/Database/database.php";
$listadoDeTramites = null;
$detallesTramite = null;
$listadoEstadosTramite = null;

function procesarRequest() {
    if($_SERVER["REQUEST_METHOD"] = "GET") {
        listarTramites();
    }
}

function procesarRequestDetallesTramite() {
    if($_SERVER["REQUEST_METHOD"] = "GET") {
        detallesTramite($_GET['Id']);
        listarEstadosTramite();
        if($_GET['Id']) {
            $idTramite = $_GET['Id'];
            echo $idTramite;
        } else {
            modificarEstadoTramite();
            header('Location: evaluarTramite.php');
            exit;
        }
    }
} 

function listarTramites() {  
    global $listadoDeTramites;
    $listadoDeTramites = ejecutarSql("SELECT tramitesadopcion.Id,tramitesadopcion.NroTramite,tramitesadopcion.NombrePostulante,tramitesadopcion.ApellidoPostulante,tramitesadopcion.IdEstadoTramiteAdopcion,tramitesadopcion.IdGato,tramitesadopcion.FechaEstado,estadostramiteadopcion.Nombre as NombreEstado,gatos.Nombre as NombreGato
        FROM tramitesadopcion 
        INNER JOIN estadostramiteadopcion ON tramitesadopcion.IdEstadoTramiteAdopcion = estadostramiteadopcion.Id
        INNER JOIN gatos ON tramitesadopcion.IdGato = gatos.Id
        ORDER BY tramitesadopcion.Id");

}

function detallesTramite($id) {
    global $detallesTramite;
    $detallesTramite = ejecutarSql("SELECT tramitesadopcion.*,estadostramiteadopcion.Nombre AS NombreEstado,gatos.Nombre AS NombreGato FROM tramitesadopcion
	INNER JOIN estadostramiteadopcion ON tramitesadopcion.IdEstadoTramiteAdopcion = estadostramiteadopcion.Id
    INNER JOIN gatos ON tramitesadopcion.IdGato = gatos.Id WHERE tramitesadopcion.Id = ${id}");
}

// -----------------------------------------------------------------------------------------------------------

function modificarEstadoTramite() {
    $idTramite = $_POST["idTramite"];
    $idEstadoDelTramite = $_POST["idEstadoDelTramite"];

    try {
        iniciarTransaccion();
        ejecutarSql("UPDATE tramitesadopcion SET IdEstadoTramiteAdopcion = ${idEstadoDelTramite} WHERE Id = ${idTramite}");
        actualizarEstadoGato($idTramite,$idEstadoDelTramite);
        commitearTransaccion();
    } catch (Exception $exo) {
        rollbackTransaccion();
    }
}

// -----------------------------------------------------------------------------------------------------------

function actualizarEstadoGato($idTramite,$idEstadoTramite) {
    $idEstadoGato = 0;

    // Estado en Tramite
    if ($idEstadoTramite == 5) {
        $idEstadoGato = 3;
    }
    // Estado de Tramite Aceptado
    if ($idEstadoTramite == 6) {
        $idEstadoGato = 1;
    }

    if ($idEstadoGato != 0) {
        ejecutarSql("UPDATE gatos SET IdEstadoGato = ${idEstadoGato} WHERE Id IN (SELECT IdGato FROM tramitesadopcion WHERE Id = ${idTramite})");
    }
}

// -----------------------------------------------------------------------------------------------------------


function listarEstadosTramite() {
    global $listadoEstadosTramite;
    $listadoEstadosTramite = ejecutarSql("SELECT * FROM estadostramiteadopcion WHERE Id IN (5,6,7)");
}

?>

<!-- SELECT * FROM gatos WHERE Id = IFNULL(13,Id) and IdRaza = IFNULL(2,IdRaza); -->
<!-- SELECT * FROM tramitesadopcion WHERE date(FechaEstado) between '2021-01-01' and '2021-06-30'; -->