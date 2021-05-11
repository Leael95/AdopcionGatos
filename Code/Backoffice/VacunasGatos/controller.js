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

function validarDatos() {
    let txtNombreVacuna = document.getElementById("nombreVacuna");
    let txtDescripcionVacuna = document.getElementById("descripcionVacuna");
    let formulario = document.getElementById("formEditarVacunas");

    if(txtNombreVacuna.value == "" ) {
        let mensajeError = document.getElementById("msjErrorNombreVacuna");
        mensajeError.classList.add("msjErrorVisible");
        mensajeError.classList.remove("msjErrorInvisible");
    } else if(txtDescripcionVacuna.value == "") {
        let mensajeErrorDescripcion = document.getElementById("msjErrorDescripcionVacuna");
        mensajeErrorDescripcion.classList.add("msjErrorVisible");
        mensajeErrorDescripcion.classList.remove("msjErrorInvisible");
    } else {
        formulario.submit();
    }
}