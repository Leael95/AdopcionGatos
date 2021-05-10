function mostrarFormularioAltaEstados() {
    window.location.href = 'vistaEditar.php';
}

function mostrarFormularioModificarEstados(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}