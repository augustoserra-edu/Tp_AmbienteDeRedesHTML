let entrada1 = document.getElementById("entrada1");
let entrada2 = document.getElementById("entrada2");
let entrada3 = document.getElementById("entrada3");
let resultado = document.getElementById("resultado");

function entradasValidas() {
    resultado.value = "";
    return validarNumero(entrada1) && validarNumero(entrada2) && validarNumero(entrada3);
}

function mayor(arg1, arg2) {
    if (arg1 >= arg2) {
        return arg1;
    } else {
        return arg2;
    }
}

document.getElementById("sumar").addEventListener("click", function() {
    if (entradasValidas()) {
        resultado.value = verificarResultado(leerNumero(entrada1) + leerNumero(entrada2) + leerNumero(entrada3));
    }
});
document.getElementById("promediar").addEventListener("click", function() {
    if (entradasValidas()) {
        resultado.value = verificarResultado((leerNumero(entrada1) + leerNumero(entrada2) + leerNumero(entrada3)) / 3);
    }
});
document.getElementById("mayor").addEventListener("click", function() {
    if (entradasValidas()) {
        resultado.value = mayor(mayor(leerNumero(entrada1), leerNumero(entrada2)), leerNumero(entrada3));
    }
});
