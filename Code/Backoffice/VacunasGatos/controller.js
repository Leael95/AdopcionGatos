function mostrarFormularioAltaVacunas() {
    window.location.href = "vistaEditar.php";
}

function mostrarFormularioModificarVacunas(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}