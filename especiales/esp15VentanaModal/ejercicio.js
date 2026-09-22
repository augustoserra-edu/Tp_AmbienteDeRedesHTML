let objContenedor = document.getElementById("contenedor");
let objModal = document.getElementById("ventanaModal");
let objAbrir = document.getElementById("abrir");
let objCerrar = document.getElementById("cerrar");

function abrirModal() {
    objContenedor.className = "contenedorPasivo";
    // También desactivamos el acceso por teclado al fondo.
    objContenedor.inert = true;
    objModal.hidden = false;
    objModal.className = "ventanaModalPrendido";
    document.getElementById("NroDePedido").focus();
}

function cerrarModal() {
    objModal.className = "ventanaModalApagado";
    objModal.hidden = true;
    objContenedor.className = "contenedorActivo";
    objContenedor.inert = false;
    objAbrir.focus();
}

objAbrir.addEventListener("click", abrirModal);
objCerrar.addEventListener("click", cerrarModal);

objModal.addEventListener("keydown", function (evento) {
    if (evento.key === "Escape") {
        evento.preventDefault();
        cerrarModal();
    }
    if (evento.key === "Tab") {
        let controles = objModal.querySelectorAll("button, input, select");
        let primero = controles[0];
        let ultimo = controles[controles.length - 1];
        if (evento.shiftKey && document.activeElement === primero) {
            evento.preventDefault();
            ultimo.focus();
        } else if (!evento.shiftKey && document.activeElement === ultimo) {
            evento.preventDefault();
            primero.focus();
        }
    }
});
