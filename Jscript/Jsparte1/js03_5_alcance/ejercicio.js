let variable = 0;
alert("La variable global se inicializó con el valor 0.");

function asignarLocal() {
    // Esta declaración crea una variable local; la global conserva su valor.
    let variable = prompt("Ingresá un valor para la variable local:");
    if (variable != null) {
        alert("Valor de la variable local: " + variable);
    }
}

function asignarGlobal() {
    let valor = prompt("Ingresá un valor para la variable global:");
    if (valor != null) {
        // No declaramos otra variable: modificamos la que está fuera de la función.
        variable = valor;
        alert("Valor de la variable global: " + variable);
    }
}

document.getElementById("local").addEventListener("click", function() {
    asignarLocal();
});
document.getElementById("global").addEventListener("click", function() {
    asignarGlobal();
});
document.getElementById("mostrar").addEventListener("click", function() {
    alert("Valor de la variable global: " + variable);
});
