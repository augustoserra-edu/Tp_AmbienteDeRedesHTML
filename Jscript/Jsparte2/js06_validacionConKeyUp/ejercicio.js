var objFormulario = document.getElementById("formulario");
var objDia = document.getElementById("dia");
var objMes = document.getElementById("mes");

objDia.addEventListener("keyup", function() {
    if (!objDia.checkValidity()) {
        alert("El día debe ser un número entero entre 1 y 31.");
    }
});

objMes.addEventListener("keyup", function() {
    if (!objMes.checkValidity()) {
        alert("El mes debe ser un número entero entre 1 y 12.");
    }
});

document.getElementById("enviar").addEventListener("click", function() {
    if (objFormulario.checkValidity()) {
        if (confirm("¿Está seguro de enviar?")) {
            objFormulario.method = "get";
            objFormulario.action = "./respuestaFormulario.html";
            objFormulario.submit();
        }
    } else {
        alert("Completá un día entre 1 y 31 y un mes entre 1 y 12.");
    }
});

document.getElementById("blanquear").addEventListener("click", function() {
    objFormulario.reset();
});
