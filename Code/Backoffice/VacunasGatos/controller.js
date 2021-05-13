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
        iniciarValidacion("nombreVacuna"),
        estaVacio("nombreVacuna"),
        validarLongitudMaxima("nombreVacuna", 5),
        iniciarValidacion("descripcionVacuna"),
        estaVacio("descripcionVacuna")];

    
    if(!validaciones.some(invalido => invalido == true)) {
            
            formulario.submit();

    }
}
