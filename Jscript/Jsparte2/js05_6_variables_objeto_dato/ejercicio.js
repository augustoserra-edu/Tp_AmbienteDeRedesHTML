var objetoPersona = { nombre: "Pablo", apellido: "Galdi", fechaNac: "01/07/1956" };
var arregloPersonas = [objetoPersona];
arregloPersonas.push({ nombre: "Jose", apellido: "Witt", fechaNac: "17/01/1985" });
var objetoPersonas = { personas: arregloPersonas };

var objNombre = document.getElementById("nombre");
var objApellido = document.getElementById("apellido");
var objNacimiento = document.getElementById("nacimiento");
var objPresentacion = document.getElementById("presentacion");
var objMensaje = document.getElementById("mensaje");

function crearPersona() {
    if (objNombre.checkValidity() && objApellido.checkValidity() && objNacimiento.checkValidity()) {
        arregloPersonas.push({
            nombre: objNombre.value,
            apellido: objApellido.value,
            fechaNac: objNacimiento.value
        });
        objNombre.value = "";
        objApellido.value = "";
        objNacimiento.value = "";
        objMensaje.innerHTML = "Persona creada correctamente.";
        listarPersonas();
    } else {
        alert("Completá el nombre, el apellido y la fecha de nacimiento en formato dd/mm/aaaa.");
    }
}

// Escapamos los datos ingresados antes de incorporarlos al texto HTML.
function textoSeguro(texto) {
    var auxiliar = document.createElement("div");
    auxiliar.appendChild(document.createTextNode(texto));
    return auxiliar.innerHTML;
}

function listarPersonas() {
    var texto = "<h1>Presentación</h1>";
    texto = texto + "<table><thead><tr><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th></tr></thead><tbody>";
    objetoPersonas.personas.forEach(function(item, indice) {
        texto = texto + "<tr><td>" + textoSeguro(item.nombre) + "</td>";
        texto = texto + "<td>" + textoSeguro(item.apellido) + "</td>";
        texto = texto + "<td>" + textoSeguro(item.fechaNac) + "</td></tr>";
    });
    texto = texto + "</tbody></table>";
    texto = texto + "<h4>Longitud del arreglo de objetos: " + arregloPersonas.length + "</h4>";
    objPresentacion.innerHTML = texto;
    objPresentacion.style.display = "block";
}

function ocultarPresentacion() {
    objPresentacion.style.display = "none";
}

document.getElementById("crear").addEventListener("click", function() {
    crearPersona();
});
document.getElementById("listar").addEventListener("click", function() {
    listarPersonas();
});
document.getElementById("ocultar").addEventListener("click", function() {
    ocultarPresentacion();
});

// Mostramos las personas precargadas al abrir el ejercicio.
listarPersonas();
