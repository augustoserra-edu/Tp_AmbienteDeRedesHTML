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
