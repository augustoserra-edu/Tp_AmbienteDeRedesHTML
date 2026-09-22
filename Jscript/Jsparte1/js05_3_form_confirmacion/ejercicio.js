let formulario = document.getElementById("formulario");

formulario.addEventListener("submit", function(evento) {
    if (!confirm("¿Confirmás el envío del formulario?")) {
        evento.preventDefault();
    }
});

formulario.addEventListener("reset", function(evento) {
    if (!confirm("¿Confirmás que querés borrar los datos?")) {
        evento.preventDefault();
    }
});
