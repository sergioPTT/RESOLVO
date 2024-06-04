document.addEventListener('DOMContentLoaded', () => {
    peticionSacarCliente();
});

let botonMostrarC = document.getElementById("mostrarCliente");

botonMostrarC.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionSacarCliente();
});

function peticionSacarCliente() {
    const url = "./controlador/administrador/controladorSacarCliente.php";
    fetch(url, {
        method: "POST",
    })
    .then(response => response.json())
    .then(respuesta => {
        let divUnico = document.querySelector("#unico");
        let divHijo = document.createElement("table");
        divHijo.setAttribute("border", "2");
        divHijo.classList.add( "w-full");
        divUnico.appendChild(divHijo);

        let encabezado = document.createElement("tr");
        encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
        encabezado.innerHTML = `
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>CALLE</th>
            <th>CODIGO POSTAL</th>
            <th>CIUDAD</th>
            <th>PROVINCIA</th>
            <th>TELEFONO</th>
            <th>DNI</th>
            <th>CONTRATO</th>
            <th>NUM INCIDENCIAS</th>
        `;
        divHijo.appendChild(encabezado);

        const crearFila = (apartado) => {
            let fila = document.createElement("tr");
            fila.classList.add("border-t", "text-sm", "font-normal");
            fila.innerHTML = `
                <td>${apartado.nombre}</td>
                <td>${apartado.apellidos}</td>
                <td>${apartado.calle}</td>
                <td>${apartado.codPostal}</td>
                <td>${apartado.ciudad}</td>
                <td>${apartado.provincia}</td>
                <td>${apartado.telefono}</td>
                <td>${apartado.dni}</td>
                <td>${apartado.contrato}</td>
                <td>${apartado.numIncidencias}</td>
            `;
            return fila;
        };

        if (Array.isArray(respuesta)) {
            respuesta.forEach(apartado => {
                divHijo.appendChild(crearFila(apartado));
            });
        } else {
            divHijo.appendChild(crearFila(respuesta));
        }
    });
}

let botonFiltrarApellido = document.getElementById("botonFiltrarApellido");

botonFiltrarApellido.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionMostrarClienteApellido();
});

function peticionMostrarClienteApellido() {
    const URL = "./controlador/administrador/controladorFiltrarApellidoCliente.php";
    let apellido = document.getElementById("filtrarApellido");
    var formularioApellido = new FormData(apellido);
    fetch(URL, {
        method: "POST",
        body: formularioApellido
    })
    .then(response => response.json())
    .then(respuesta => {
        let divUnico = document.querySelector("#unico");
        let divHijo = document.createElement("table");
        divHijo.setAttribute("border", "2");
        divHijo.classList.add("w-full");
        divUnico.appendChild(divHijo);

        let encabezado = document.createElement("tr");
        encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
        encabezado.innerHTML = `
          
            <th>nombre</th>
            <th>apellidos</th>
            <th>calle</th>
            <th>codPostal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Email</th>
            <th>contrato</th>
            <th>numIncidencias</th>
        `;
        divHijo.appendChild(encabezado);

        const crearFila = (apartado) => {
            let fila = document.createElement("tr");
            fila.classList.add("border-t", "text-sm", "font-normal");
            fila.innerHTML = `
       
                <td>${apartado.nombre}</td>
                <td>${apartado.apellidos}</td>
                <td>${apartado.calle}</td>
                <td>${apartado.codPostal}</td>
                <td>${apartado.ciudad}</td>
                <td>${apartado.provincia}</td>
                <td>${apartado.telefono}</td>
                <td>${apartado.dni}</td>
                <td>${apartado.email}</td>
                <td>${apartado.contrato}</td>
                <td>${apartado.numIncidencias}</td>
            `;
            return fila;
        };

        if (Array.isArray(respuesta)) {
            respuesta.forEach(apartado => {
                divHijo.appendChild(crearFila(apartado));
            });
        } else {
            divHijo.appendChild(crearFila(respuesta));
        }
    });
}

// Repite el mismo patrón para `botonFiltrarCiudad` y `botonFiltrarContrato`
let botonFiltrarCiudad = document.getElementById("botonFiltrarCiudad");

botonFiltrarCiudad.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionMostrarClienteCiudad();
});

function peticionMostrarClienteCiudad() {
    const URL = "./controlador/administrador/controladorFiltrarCiudadCliente.php";
    let ciudad = document.getElementById("filtrarCiudad");
    var formularioCiudad = new FormData(ciudad);
    fetch(URL, {
        method: "POST",
        body: formularioCiudad
    })
    .then(response => response.json())
    .then(respuesta => {
        let divUnico = document.querySelector("#unico");
        let divHijo = document.createElement("table");
        divHijo.setAttribute("border", "2");
        divHijo.classList.add("-screen", "w-full");
        divUnico.appendChild(divHijo);

        let encabezado = document.createElement("tr");
        encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
        encabezado.innerHTML = `
    
            <th>nombre</th>
            <th>apellidos</th>
            <th>calle</th>
            <th>codPostal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Email</th>
            <th>contrato</th>
            <th>numIncidencias</th>
        `;
        divHijo.appendChild(encabezado);

        const crearFila = (apartado) => {
            let fila = document.createElement("tr");
            fila.classList.add("border-t", "text-sm", "font-normal");
            fila.innerHTML = `
               
                <td>${apartado.nombre}</td>
                <td>${apartado.apellidos}</td>
                <td>${apartado.calle}</td>
                <td>${apartado.codPostal}</td>
                <td>${apartado.ciudad}</td>
                <td>${apartado.provincia}</td>
                <td>${apartado.telefono}</td>
                <td>${apartado.dni}</td>
                <td>${apartado.email}</td>
                <td>${apartado.contrato}</td>
                <td>${apartado.numIncidencias}</td>
            `;
            return fila;
        };

        if (Array.isArray(respuesta)) {
            respuesta.forEach(apartado => {
                divHijo.appendChild(crearFila(apartado));
            });
        } else {
            divHijo.appendChild(crearFila(respuesta));
        }
    });
}

let botonFiltrarContrato = document.getElementById("botonFiltrarContrato");

botonFiltrarContrato.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionMostrarClienteContrato();
});

function peticionMostrarClienteContrato() {
    const URL = "./controlador/administrador/controladorFiltrarContratoCliente.php";
    let contrato = document.getElementById("filtrarContrato");
    var formularioContrato = new FormData(contrato);
    fetch(URL, {
        method: "POST",
        body: formularioContrato
    })
    .then(response => response.json())
    .then(respuesta => {
        let divUnico = document.querySelector("#unico");
        let divHijo = document.createElement("table");
        divHijo.setAttribute("border", "2");
        divHijo.classList.add( "w-full");
        divUnico.appendChild(divHijo);

        let encabezado = document.createElement("tr");
        encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
        encabezado.innerHTML = `
       
            <th>nombre</th>
            <th>apellidos</th>
            <th>calle</th>
            <th>codPostal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Email</th>
            <th>contrato</th>
            <th>numIncidencias</th>
        `;
        divHijo.appendChild(encabezado);

        const crearFila = (apartado) => {
            let fila = document.createElement("tr");
            fila.classList.add("border-t", "text-sm", "font-normal");
            fila.innerHTML = `
         
                <td>${apartado.nombre}</td>
                <td>${apartado.apellidos}</td>
                <td>${apartado.calle}</td>
                <td>${apartado.codPostal}</td>
                <td>${apartado.ciudad}</td>
                <td>${apartado.provincia}</td>
                <td>${apartado.telefono}</td>
                <td>${apartado.dni}</td>
                <td>${apartado.email}</td>
                <td>${apartado.contrato}</td>
                <td>${apartado.numIncidencias}</td>
            `;
            return fila;
        };

        if (Array.isArray(respuesta)) {
            respuesta.forEach(apartado => {
                divHijo.appendChild(crearFila(apartado));
            });
        } else {
            divHijo.appendChild(crearFila(respuesta));
        }
    });
}
