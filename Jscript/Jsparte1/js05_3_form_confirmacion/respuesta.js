// Complemento de la página de respuesta: leemos los datos enviados por GET.
let parametros = new URLSearchParams(window.location.search);
let nombre = parametros.get("nombre");
let apellido = parametros.get("apellido");
if (nombre == null) {
    nombre = "";
}
if (apellido == null) {
    apellido = "";
}
document.getElementById("nombre").textContent = "Nombre: " + nombre;
document.getElementById("apellido").textContent = "Apellido: " + apellido;
