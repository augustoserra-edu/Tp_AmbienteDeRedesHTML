// Demostración local del formulario: los controles no envían datos a un servidor.
let formulario = document.getElementById("formulario");
let resultado = document.getElementById("resultado");
formulario.addEventListener("submit", function(evento) {
    evento.preventDefault();
    resultado.textContent = "Formulario completado correctamente. ";
});
formulario.addEventListener("reset", function() {
    resultado.textContent = "";
});
