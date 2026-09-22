let acumulador = 0;
let display = document.getElementById("display");

// Los botones llaman a la misma función con distintos argumentos.
function agregarDigito(digito) {
    display.value = display.value + digito;
}

document.getElementById("digito0").addEventListener("click", function() {
    agregarDigito("0");
});
document.getElementById("digito1").addEventListener("click", function() {
    agregarDigito("1");
});
document.getElementById("digito2").addEventListener("click", function() {
    agregarDigito("2");
});
document.getElementById("digito3").addEventListener("click", function() {
    agregarDigito("3");
});
document.getElementById("digito4").addEventListener("click", function() {
    agregarDigito("4");
});
document.getElementById("digito5").addEventListener("click", function() {
    agregarDigito("5");
});
document.getElementById("digito6").addEventListener("click", function() {
    agregarDigito("6");
});
document.getElementById("digito7").addEventListener("click", function() {
    agregarDigito("7");
});
document.getElementById("digito8").addEventListener("click", function() {
    agregarDigito("8");
});
document.getElementById("digito9").addEventListener("click", function() {
    agregarDigito("9");
});

document.getElementById("acumular").addEventListener("click", function() {
    if (validarNumero(display)) {
        let resultado = verificarResultado(acumulador + leerNumero(display));
        if (resultado !== "") {
            acumulador = resultado;
        }
    }
});
document.getElementById("mostrar").addEventListener("click", function() {
    display.value = acumulador;
});
document.getElementById("borrar-acumulador").addEventListener("click", function() {
    acumulador = 0;
});
document.getElementById("borrar-display").addEventListener("click", function() {
    display.value = "";
});
