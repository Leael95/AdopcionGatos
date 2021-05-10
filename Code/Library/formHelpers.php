<?php 

function mostrarCampoTexto($Objeto,$Campo) {
    if($Objeto != null && isset($Campo)){
        if(array_key_exists($Campo, $Objeto)){
            echo $Objeto["{$Campo}"];
        } else {
            echo '';
        }
    }
}

function mostrarId($Objeto) {
    if($Objeto != null) {
        echo $Objeto['Id'];
    } else {
        echo null;
    }
}

function obtenerId($Objeto) {
    if($Objeto != null) {
        return $Objeto['Id'];
    } else {
        return null;
    }
}