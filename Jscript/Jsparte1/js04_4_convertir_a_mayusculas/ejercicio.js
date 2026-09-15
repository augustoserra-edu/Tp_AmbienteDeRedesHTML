document.getElementById("nombre").addEventListener("focusout", function() {
    this.value = this.value.toUpperCase();
});

document.getElementById("apellido").addEventListener("focusout", function() {
    this.value = this.value.toUpperCase();
});
