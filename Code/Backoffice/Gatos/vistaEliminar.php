<?php 
    require "controller.php";

    if($_SERVER["REQUEST_METHOD"] == "GET") {

        $existeId = array_key_exists('id',$_GET);

        if($existeId == true) {
            eliminarGato();
            vistaListado();
        } else {
            echo "portate bien";
        }
    }
?>