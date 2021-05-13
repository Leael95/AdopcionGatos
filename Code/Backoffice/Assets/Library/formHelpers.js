function estaVacio(nombreCampo) {
    let resultado = false;
    let txt = document.getElementById(nombreCampo);
    let mensajeError = document.getElementById("msjError" + nombreCampo);
    console.log(txt.esvalido, txt.value, nombreCampo, "Vacio");

    if(txt.value == ""){
        mensajeError.classList.add("msjErrorVisible");
        mensajeError.classList.remove("msjErrorInvisible");
        resultado = true;
        txt.esvalido = false;
    } else {
        if(txt.esvalido == true){
            mensajeError.classList.add("msjErrorInvisible");
            mensajeError.classList.remove("msjErrorVisible");
        }
    }

    return resultado;
}

function validarLongitudMaxima(nombreCampo, longitudMaxima) {
    let resultado = false;
    let txt = document.getElementById(nombreCampo);
    let mensajeError = document.getElementById("msjError" + nombreCampo);
    console.log(txt.esvalido, txt.value, nombreCampo, "Longitud Maxima");

    if(txt.value.length > longitudMaxima){
        mensajeError.classList.add("msjErrorVisible");
        mensajeError.classList.remove("msjErrorInvisible");
        resultado = true;
        txt.esvalido = false;
    } else {
        if(txt.esvalido == true){
            mensajeError.classList.add("msjErrorInvisible");
            mensajeError.classList.remove("msjErrorVisible");
        }
    }

    return resultado;
}

function iniciarValidacion(nombreCampo) {
    let txt = document.getElementById(nombreCampo);
    txt.esvalido = true;
}