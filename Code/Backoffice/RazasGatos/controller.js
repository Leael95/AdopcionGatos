function mostrarFormularioAltaRazas() {
    window.location.href = 'vistaEditar.php';
}

function mostrarFormularioModificarRaza(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}

function eliminar(id) {
    window.location.href = `vistaEliminar.php?Id=${id}`;
}

function mostrarListado() {
    window.location.href = "vistaListado.php";
}

function validarDatos() {
    let txtRazaGato = document.getElementById("razaGato");
    let formulario = document.getElementById("formEditarRazaGato");

    if(txtRazaGato.value == "") {
        let mensajeError = document.getElementById("msjErrorRazaGato");
        mensajeError.classList.add("msjErrorVisible");
        mensajeError.classList.remove("msjErrorInvisible");
    } else {
        formulario.submit();
    }
}