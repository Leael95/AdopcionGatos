<?php 

$conexionActiva = conectarBD();

function conectarBD() : mysqli {
    $conexion = mysqli_connect('localhost', 'root', '', 'proyectoadopciongatos');

    if(!$conexion) {
        echo "Error no se pudo conectar";
        exit;
    }

    // $colores = "INSERT INTO coloresgatos (Nombre) VALUES ('pepe')";
    // mysqli_query($conexion, $colores);
    return $conexion;

}

function ejecutarSql($sentenciaSql) {
    global $conexionActiva;
    $resultado = mysqli_query($conexionActiva, $sentenciaSql);

    return $resultado;
}

function insertAndRetrieveId($sentenciaSql) {

    global $conexionActiva;
    mysqli_query($conexionActiva, $sentenciaSql);

    $last_id = mysqli_insert_id($conexionActiva);

    return $last_id;
}

function desconectarBD() {
    global $conexionActiva;
    mysqli_close($conexionActiva);
}

function iniciarTransaccion() {
    global $conexionActiva;
    mysqli_begin_transaction($conexionActiva, MYSQLI_TRANS_START_READ_WRITE);
}

function commitearTransaccion() {
    global $conexionActiva;
    mysqli_commit($conexionActiva);
}

function rollbackTransaccion() {
    global $conexionActiva;
    mysqli_rollback($conexionActiva);
}