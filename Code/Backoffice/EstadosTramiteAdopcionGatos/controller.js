function mostrarFormularioAlta() {
    window.location.href = "vistaEditar.php";
}

function mostrarFormularioModificarETAG(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}

function eliminar(id) {
    window.location.href = `vistaEliminar.php?Id=${id}`;
}

function mostrarListado() {
    window.location.href = "vistaListado.php";
}

// function validarDatos() {
//     let txtNombreETAG = document.getElementById("estadosTramiteAdopcion");
//     let formulario = document.getElementById("formEditarETAG");

//     if(txtNombreETAG.value == "") {
//         let mensajeError = document.getElementById("msjErrorETAG");
//         mensajeError.classList.add("msjErrorVisible");
//         mensajeError.classList.remove("msjErrorInvisible");
//     } else {
//         formulario.submit();
//     }
// }

function enviar() {
    let formulario = document.getElementById("formEditarETAG");
    let validaciones = [
        iniciarValidacion("estadosTramiteAdopcion"),
        estaVacio("estadosTramiteAdopcion"),
        validarLongitudMaxima("estadosTramiteAdopcion", 5)];

    
    if(!validaciones.some(invalido => invalido == true)) {
            
            formulario.submit();

    }
}