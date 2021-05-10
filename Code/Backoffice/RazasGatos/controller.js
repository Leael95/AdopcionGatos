function mostrarFormularioAltaRazas() {
    window.location.href = 'vistaEditar.php';
}

function mostrarFormularioModificarRaza(id) {
    window.location.href = `vistaEditar.php?Id=${id}`;
}