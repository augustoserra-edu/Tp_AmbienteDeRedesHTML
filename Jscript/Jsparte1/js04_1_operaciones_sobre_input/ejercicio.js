let campo = document.getElementById("valor");

document.getElementById("mostrar").addEventListener("click", function() {
    alert(campo.value);
});
document.getElementById("sumar").addEventListener("click", function() {
    if (validarNumero(campo)) {
        campo.value = verificarResultado(leerNumero(campo) + 1);
    }
});
document.getElementById("cuadrado").addEventListener("click", function() {
    if (validarNumero(campo)) {
        let x = leerNumero(campo);
        campo.value = verificarResultado(x * x);
    }
});
document.getElementById("doble").addEventListener("click", function() {
    if (validarNumero(campo)) {
        campo.value = verificarResultado(leerNumero(campo) * 2);
    }
});
document.getElementById("potencia").addEventListener("click", function() {
    if (validarNumero(campo)) {
        campo.value = verificarResultado(2 ** leerNumero(campo));
    }
});
