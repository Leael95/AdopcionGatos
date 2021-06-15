function onSeleccionarGato(idGato) {
    let tblGatos = document.getElementById('gatosEnAdopcion');
    let chkListadoGatos = tblGatos.getElementsByTagName('INPUT');
    let chkGatoSeleccionado = document.getElementById(`gato[${idGato}]`);

    for(let i = 0; i < chkListadoGatos.length; i++) {
    
        let chkGatoActual = chkListadoGatos[i];

        if(chkGatoSeleccionado.dataset.gatoid != chkGatoActual.dataset.gatoid) {
            chkGatoActual.checked = false;
        } 
    }
}