document.getElementById("alerta").addEventListener("click", function() {
    alert("Hola. Este mensaje se ejecuta al hacer click en el botón.");
});

document.getElementById("escribir").addEventListener("click", function() {
    // En un evento usamos innerHTML para conservar el resto del documento.
    document.getElementById("resultado").innerHTML = "<h2>Texto escrito desde el evento click.</h2>";
});
