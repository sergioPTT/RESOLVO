document.addEventListener('DOMContentLoaded', () => {
    peticionSacarDatosCliente();
});

function peticionSacarDatosCliente() {
    const formulario = new FormData(document.getElementById("formularioPerfil"));
    const url = "./controlador/perfil/ControladorSacarDatos.php";
    fetch(url, {
        method: 'POST',
        body: formulario,
    })
        .then(response => response.json())
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("form");
            divHijo.id = "formularioCliente";
            divHijo.classList.add("w-full", "overflow-hidden", "shadow-lg", "rounded-lg", "divide-y", "divide-gray-200");

            const crearFila = (apartado) => {
                let fila = document.createElement("div");
                fila.classList.add("flex", "flex-col", "p-4", "text-sm", "font-normal", "divide-y", "divide-gray-200");

                let crearElemento = (etiqueta, nombre, valor, editable = true) => {
                    let elemento = document.createElement(etiqueta);
                    elemento.setAttribute("name", nombre);
                    elemento.value = valor;
                    elemento.classList.add("py-2", "px-3", "border", "border-gray-300", "rounded-md");
                    if (!editable) {
                        elemento.disabled = true;
                    }
                    return elemento;
                };

                fila.appendChild(crearElemento("input", "nombre", apartado.nombre));
                fila.appendChild(crearElemento("input", "apellidos", apartado.apellidos));
                fila.appendChild(crearElemento("input", "calle", apartado.calle));
                fila.appendChild(crearElemento("input", "codPostal", apartado.codPostal));
                fila.appendChild(crearElemento("input", "ciudad", apartado.ciudad));
                fila.appendChild(crearElemento("input", "provincia", apartado.provincia));
                fila.appendChild(crearElemento("input", "telefono", apartado.telefono));
                fila.appendChild(crearElemento("input", "dni", apartado.dni));
                fila.appendChild(crearElemento("input", "email", apartado.email));
                fila.appendChild(crearElemento("input", "contrato", apartado.contrato, false));
                fila.appendChild(crearElemento("input", "numIncidencias", apartado.numIncidencias, false));

                return fila;
            };

            if (Array.isArray(respuesta)) {
                respuesta.forEach(apartado => {
                    divHijo.appendChild(crearFila(apartado));
                });
            } else {
                divHijo.appendChild(crearFila(respuesta));
            }

            divUnico.appendChild(divHijo);

            // Añadir eventos a los botones de editar y guardar
            document.getElementById("editButton").addEventListener("click", habilitarEdicion);
            document.getElementById("saveButton").addEventListener("click", guardarCambios);
        });
}

function habilitarEdicion() {
    const inputs = document.querySelectorAll("#unico form input");
    inputs.forEach(input => {
        if (input.name !== "contrato" && input.name !== "numIncidencias") {
            input.disabled = false;
        }
    });
    document.getElementById("editButton").classList.add("hidden");
    document.getElementById("saveButton").classList.remove("hidden");
}

function guardarCambios() {
    const formulario = new FormData(document.querySelector("#unico form"));
    const url = "./controlador/perfil/ControladorGuardarDatos.php";
    fetch(url, {
        method: 'POST',
        body: formulario,
    })
        .then(response => response.json())
        .then(respuestaJson => {
            if (respuestaJson.resultado === "si") {

                alert("LOS DATOS DEL CLIENTE SE MODIFICARON CORRECTEMENTE");
                 location.reload();
            } else if (respuestaJson.resultado === "no") {
                alert("TODO MAL");
                alert("ERROR LOS DATOS DEL CLIENTE NO SE MODIFICARON CORRECTEMENTE");
            } else {
              alert("Hubo un fallo random en el proceso");
            }

        })
        .catch(error => {
            console.error('Error:', error);
            alert("Error al guardar los datos");
        });
}
