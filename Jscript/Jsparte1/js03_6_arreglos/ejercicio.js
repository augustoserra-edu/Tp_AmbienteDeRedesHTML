var arregloFrutas = [];
arregloFrutas = ["banana", "manzana"];
var fruta = prompt("Ingresá una tercera fruta:");
if (fruta != null && fruta != "") {
    arregloFrutas.push(fruta);
}

// Este script se ejecuta durante la lectura del HTML, sin defer.
document.write("<h3>Tipo para arregloFrutas: " + typeof arregloFrutas + "</h3>");
document.write("<h3>Primer elemento cargado desde programa: " + arregloFrutas[0] + "</h3>");
document.write("<h3>Segundo elemento cargado desde programa: " + arregloFrutas[1] + "</h3>");
document.write("<h3 id='tercera-fruta'></h3>");
document.write("<h3>Cantidad de elementos: " + arregloFrutas.length + "</h3>");

// Conservamos como texto literal lo que se ingresa por teclado.
if (arregloFrutas.length == 3) {
    document.getElementById("tercera-fruta").textContent = "Tercer elemento cargado desde teclado: " + arregloFrutas[2];
} else {
    document.getElementById("tercera-fruta").innerHTML = "Tercer elemento cargado desde teclado: No ingresado";
}
