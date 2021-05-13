function mostrarFormularioAltaEstados() {
    window.location.href = 'vistaEditar.php';
}

function mostrarFormularioModificarEstados(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}

function eliminar(id) {
    window.location.href = `vistaEliminar.php?Id=${id}`;
}

function mostrarListado() {
    window.location.href = "vistaListado.php";
}

// function validarDatos() {
//     let txtEstadosGato = document.getElementById("estadosGato");
//     let formulario = document.getElementById("formEditarEstadosGato");

//     if(txtEstadosGato.value == "") {
//         let mensajeError = document.getElementById("msjErrorEstadosGato");
//         mensajeError.classList.add("msjErrorVisible");
//         mensajeError.classList.remove("msjErrorInvisible");
//     } else {
//         formulario.submit();
//     }
// }

function enviar() {
    let formulario = document.getElementById("formEditarEstadosGato");
    let validaciones = [
        iniciarValidacion("estadosGato"),
        estaVacio("estadosGato"),
        validarLongitudMaxima("estadosGato", 5)];

    
    if(!validaciones.some(invalido => invalido == true)) {
            
            formulario.submit();

    }
}