const suma = (a, b) => {
    return a + b;
};

document.getElementById("sumar").addEventListener("click", function() {
    var entradaA = document.getElementById("a");
    var entradaB = document.getElementById("b");
    var resultado = document.getElementById("resultado");
    resultado.value = "";
    if (validarNumero(entradaA) && validarNumero(entradaB)) {
        resultado.value = verificarResultado(suma(leerNumero(entradaA), leerNumero(entradaB)));
    }
});
