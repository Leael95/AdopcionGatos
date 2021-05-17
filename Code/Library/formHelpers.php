<?php 
/** 
 * Descripción: Esta función recibe un objeto de mysqli y hace un echo del valor del campo que se pasó como parámetro.
 *  Si el campo no existe en el objeto, hace un echo en blanco.
 */
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