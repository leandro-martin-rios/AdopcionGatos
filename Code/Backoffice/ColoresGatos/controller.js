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

// function validarDatos() {
//     let txtNombreColor = document.getElementById("nombreColor");
//     let formulario = document.getElementById("formEditarColorGato");

//     if(txtNombreColor.value == "") {
//         let mensajeError = document.getElementById("msjErrorNombreColor");
//         mensajeError.classList.add("msjErrorVisible");
//         mensajeError.classList.remove("msjErrorInvisible");
//     } else {
//         formulario.submit();
//     }
// }

function enviar() {
    let formulario = document.getElementById("formEditarColorGato");
    let validaciones = [
        iniciarValidacion("nombreColor"),
        estaVacio("nombreColor"),
        validarLongitudMaxima("nombreColor", 5)];

    
    if(!validaciones.some(invalido => invalido == true)) {
            
            formulario.submit();

    }
}

// $(document).ready(function() {
//     console.log("leaLoaded");
//     $("#btnGuardar").click(function(event) {
//         console.log(event);
//         // enviar();
//         $("#btnGuardar").attr("value","Me apretaron");

//     }) 
// });

function prueba(funcionEjecutar) {
    funcionEjecutar("osiosi");
}

function pepito(nombre) {
    console.log("hola desde pepito");
    console.log(nombre);
}

function pepito2(nombre2) {
    alert(nombre2);
}

function botonPrueba() {
    prueba(pepito2);
}