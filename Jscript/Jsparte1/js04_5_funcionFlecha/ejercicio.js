const suma = (a, b) => {
    return a + b;
};

document.getElementById("sumar").addEventListener("click", function() {
    let entradaA = document.getElementById("a");
    let entradaB = document.getElementById("b");
    let resultado = document.getElementById("resultado");
    resultado.value = "";
    if (validarNumero(entradaA) && validarNumero(entradaB)) {
        resultado.value = verificarResultado(suma(leerNumero(entradaA), leerNumero(entradaB)));
    }
});
