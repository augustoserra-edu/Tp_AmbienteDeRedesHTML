// Los ejercicios operan con enteros, usando parseInt como en los apuntes.
function leerNumero(campo) {
    return parseInt(campo.value, 10);
}

function validarNumero(campo) {
    if (!campo.checkValidity()) {
        alert("Ingresá un número entero válido en cada campo.");
        return false;
    }
    return true;
}

function verificarResultado(numero) {
    if (isFinite(numero)) {
        return numero;
    }
    alert("El resultado está fuera del rango numérico.");
    return "";
}
