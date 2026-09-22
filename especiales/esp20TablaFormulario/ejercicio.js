// esp10TablaVariableArregloDeObjetos
{
let objPedidos = JSON.parse(textoRenglonesPedido);
let objUnidades = JSON.parse(textoUnidadesDeMedida);
let objTbDatos = document.getElementById("tbDatos");
let objEstado = document.getElementById("estado");

function vaciarDatos() {
    objTbDatos.replaceChildren();
    objEstado.textContent = "Tabla vacía";
}

function cargarDatos() {
    vaciarDatos();
    objPedidos.renglonesPedido.forEach(function (renglon) {
        let objFila = document.createElement("tr");
        ["NroDePedido", "Cod_articulo", "Descripcion", "codUM", "Cantidad", "PrecioUnitario", "Pdf_comprobante"].forEach(function (campo) {
            let objCelda = document.createElement("td");
            objCelda.setAttribute("data-campo", campo);
            if (campo === "codUM") {
                let unidad = objUnidades.unidadesDeMedida.find(function (item) {
                    return item.codUM === renglon.codUM;
                });
                objCelda.textContent = unidad.codUM + " - " + unidad.descripcion;
            } else if (campo === "Pdf_comprobante") {
                if (renglon.Pdf_comprobante) {
                    let enlace = document.createElement("a");
                    enlace.href = renglon.Pdf_comprobante;
                    enlace.textContent = "Ver PDF";
                    objCelda.appendChild(enlace);
                } else {
                    objCelda.textContent = "Sin adjuntar";
                }
            } else {
                objCelda.textContent = campo === "PrecioUnitario"
                    ? renglon[campo].toFixed(2) : renglon[campo];
            }
            objFila.appendChild(objCelda);
        });
        objTbDatos.appendChild(objFila);
    });
    objEstado.textContent = objPedidos.renglonesPedido.length + " renglones cargados";
}

document.getElementById("cargar").addEventListener("click", cargarDatos);
document.getElementById("vaciar").addEventListener("click", vaciarDatos);

}

// esp05FormVariableArregloDeObjetos
{
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

}

// esp15VentanaModal
{
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

}
