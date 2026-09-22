let objSelect = document.getElementById("codUM");
let objFormulario = document.getElementById("formulario");
let objResultado = document.getElementById("resultado");

function crearOpciones(objUnidades) {
    objSelect.replaceChildren();
    objUnidades.unidadesDeMedida.forEach(function (unidad) {
        let objOpcion = document.createElement("option");
        objOpcion.value = unidad.codUM;
        objOpcion.textContent = unidad.descripcion;
        objSelect.appendChild(objOpcion);
    });
}

let objUnidades = JSON.parse(textoUnidadesDeMedida);
crearOpciones(objUnidades);

objFormulario.addEventListener("input", function () {
    objResultado.textContent = "";
});

// Demostración local: todavía no hay un servidor que reciba el formulario.
objFormulario.addEventListener("submit", function (evento) {
    evento.preventDefault();
    objResultado.textContent = "Formulario validado correctamente. Los datos no se enviaron a un servidor.";
});

let objComprobante = document.getElementById("Pdf_comprobante");
objComprobante.addEventListener("change", function () {
    let archivo = objComprobante.files[0];
    objComprobante.setCustomValidity(archivo && !/\.pdf$/i.test(archivo.name)
        ? "Seleccioná un archivo PDF." : "");
});
