let objFormulario = document.getElementById("formulario");
let objApellido = document.getElementById("apellido");
let objNombres = document.getElementById("nombres");
let objSaldo = document.getElementById("saldo");
let objBtAlta = document.getElementById("alta");
let objBtModi = document.getElementById("modi");
let objBtBaja = document.getElementById("baja");
let objBtBlanquear = document.getElementById("blanquear");

function todoListo() {
    objBtBlanquear.disabled = objApellido.value == "" && objNombres.value == "" && objSaldo.value == "";

    if (objFormulario.checkValidity()) {
        objBtAlta.disabled = false;
        objBtModi.disabled = false;
        objBtBaja.disabled = false;
    } else {
        objBtAlta.disabled = true;
        objBtModi.disabled = true;
        objBtBaja.disabled = true;
    }
}

function cargaInicial() {
    objFormulario.reset();
    todoListo();
    objApellido.select();
}

function enviarFormulario(operacion) {
    if (objFormulario.checkValidity()) {
        if (confirm("¿Está seguro de enviar la operación " + operacion + "?")) {
            document.getElementById("operacion").value = operacion;
            objFormulario.method = "get";
            objFormulario.action = "./respuestaFormulario.html";
            objFormulario.submit();
        }
    }
}

window.addEventListener("load", function () {
    cargaInicial();
});

[objApellido, objNombres, objSaldo].forEach(function (item, indice) {
    item.addEventListener("keyup", function () {
        todoListo();
    });
    item.addEventListener("focus", function () {
        todoListo();
    });
    item.addEventListener("input", function () {
        todoListo();
    });
});

objBtBlanquear.addEventListener("click", function () {
    cargaInicial();
});
objBtAlta.addEventListener("click", function () {
    enviarFormulario("Alta");
});
objBtModi.addEventListener("click", function () {
    enviarFormulario("Modificación");
});
objBtBaja.addEventListener("click", function () {
    enviarFormulario("Baja");
});
