function mostrarFormularioAltaVacunas() {
    window.location.href = "vistaEditar.php";
}

function mostrarFormularioModificarVacunas(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}

function eliminar(id) {
    window.location.href = `vistaEliminar.php?Id=${id}`;
}

function mostrarListado() {
    window.location.href = "vistaListado.php";
}

function enviar() {
    let formulario = document.getElementById("formEditarVacunas");
    let validaciones = [
        estaVacio("nombreVacuna"),
        estaVacio("descripcionVacuna")];

    
    if(!validaciones.some(invalido => invalido == true)) {
            
            formulario.submit();

    }
}

function estaVacio(nombreCampo) {
    let resultado = false;
    let txt = document.getElementById(nombreCampo);
    let mensajeError = document.getElementById("msjError" + nombreCampo);

    if(txt.value == ""){
        mensajeError.classList.add("msjErrorVisible");
        mensajeError.classList.remove("msjErrorInvisible");
        resultado = true;
    } else {
        mensajeError.classList.add("msjErrorInvisible");
        mensajeError.classList.remove("msjErrorVisible");
    }

    return resultado;
}