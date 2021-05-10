function mostrarFormularioAlta() {
    window.location.href = "vistaEditar.php";
}

function mostrarFormularioModificarColor(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}

function eliminar(id) {
    window.location.href = `vistaEliminar.php?Id=${id}`;
}

function mostrarListado() {
    window.location.href = "vistaListado.php";
}