function verDetalleTramite(id) {
    window.location.href = `detallesTramite.php?Id=${id}`;
}

// -----------------------------------------------------------------------------------------------------------

function filtrar() {

    let requestURL = `evaluarTramite.php?`;
    let estadoTramite = document.getElementById("estadoTramite");
    let nroTramite = document.getElementById("nroTramite");

    if(estadoTramite.value != "" || estadoTramite.value != undefined) {
        requestURL = requestURL + "estadoTramite=" + encodeURIComponent(estadoTramite.value) + "&";
    }

    if(nroTramite.value != "" || nroTramite.value != undefined) {
        requestURL = requestURL + "nroTramite=" + encodeURIComponent(nroTramite.value) + "&";
    }

    window.location.href = requestURL;
}

// -----------------------------------------------------------------------------------------------------------

function limpiarTodo() {
    window.location.href = "evaluarTramite.php";
}