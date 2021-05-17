function vistaCrear() {
    window.location.href = "vistaEditar.php";
}

function vistaListado() {
    window.location.href = "vistaListado.php";
}

function vistaModificar(id) {
    window.location.href = `vistaEditar.php?id=${id}`;
}