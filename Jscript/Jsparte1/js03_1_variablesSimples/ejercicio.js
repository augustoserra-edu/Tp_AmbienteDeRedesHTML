var z;
let q;
var a = 1;
var b = "1";
var c = 2;

function mostrar(nombre, valor) {
    document.getElementById("salida").innerHTML = "<h2 id='valor-variable'></h2><h2>Tipo de " + nombre + ": " + typeof valor + "</h2>";
    // El valor puede venir de un prompt; lo mostramos como texto, no como HTML.
    document.getElementById("valor-variable").textContent = "Valor de " + nombre + ": " + valor;
}

document.getElementById("z").addEventListener("click", function() {
    mostrar("z", z);
});
document.getElementById("q").addEventListener("click", function() {
    var valor = prompt("Nuevo valor para q:");
    if (valor != null) {
        q = valor;
        mostrar("q", q);
    }
});
document.getElementById("a").addEventListener("click", function() {
    mostrar("a", a);
});
document.getElementById("b").addEventListener("click", function() {
    mostrar("b", b);
});
document.getElementById("c").addEventListener("click", function() {
    mostrar("c", c);
});
document.getElementById("suma1").addEventListener("click", function() {
    mostrar("suma1", a + b);
});
document.getElementById("suma2").addEventListener("click", function() {
    mostrar("suma2", a + c);
});
