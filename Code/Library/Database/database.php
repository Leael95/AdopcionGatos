<?php 

$conexionActiva = conectarBD();

function conectarBD() : mysqli {
    $conexion = mysqli_connect('localhost', 'root', 'root', 'proyectoadopciongatos');

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
    mysqli_query($conexionActiva, $sentenciaSql);
}

function desconectarBD() {
    global $conexionActiva;
    mysqli_close($conexionActiva);
}