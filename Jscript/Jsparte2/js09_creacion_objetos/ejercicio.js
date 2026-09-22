let objContenedor = document.getElementById("contenedor");

function crearElemento() {
    let objDiv = document.createElement("div");
    let textoHtml = "<h1>Elemento creado: ";
    textoHtml = textoHtml + objContenedor.childNodes.length;
    textoHtml = textoHtml + "</h1>";
    objDiv.innerHTML = textoHtml;
    objDiv.className = "elemento";
    objContenedor.appendChild(objDiv);
}

function limpiarElementos() {
    while (objContenedor.childNodes.length > 0) {
        objContenedor.removeChild(objContenedor.childNodes[0]);
    }
}

function mostrarInformacion() {
    alert("Cantidad de elementos: " + objContenedor.childNodes.length);
    if (objContenedor.childNodes.length == 0) {
        alert("No hay elementos creados.");
    } else {
        objContenedor.childNodes.forEach(function (item, indice) {
            alert("Índice: " + indice + " innerHTML: " + item.innerHTML);
        });
    }
}

document.getElementById("crear").addEventListener("click", function () {
    crearElemento();
});
document.getElementById("limpiar").addEventListener("click", function () {
    limpiarElementos();
});
document.getElementById("info").addEventListener("click", function () {
    mostrarInformacion();
});
