// Complemento de la página de respuesta: leemos los datos enviados por GET.
var parametros = new URLSearchParams(window.location.search);
var nombre = parametros.get("nombre");
var apellido = parametros.get("apellido");
if (nombre == null) {
    nombre = "";
}
if (apellido == null) {
    apellido = "";
}
document.getElementById("nombre").textContent = "Nombre: " + nombre;
document.getElementById("apellido").textContent = "Apellido: " + apellido;
