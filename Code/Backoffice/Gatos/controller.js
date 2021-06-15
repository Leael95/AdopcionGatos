function vistaCrear() {
    window.location.href = "vistaEditar.php";
}

function vistaListado() {
    window.location.href = "vistaListado.php";
}

function vistaModificar(id) {
    window.location.href = `vistaEditar.php?id=${id}`;
}

function vistaEliminar(id) {
    window.location.href = `vistaEliminar.php?id=${id}`;
}

function checkboxChecked(idVacuna) {
    let checkbox = document.getElementById(`vacunas[${idVacuna}]`);
    let fecha = document.getElementById(`fechaVacunas[${idVacuna}]`);
    if(checkbox.checked) {
        fecha.setAttribute("required","");
    } else {
        fecha.removeAttribute("required");
        fecha.value = null;
    }
}