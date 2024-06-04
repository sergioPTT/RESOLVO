document.addEventListener('DOMContentLoaded', () => {
    peticionSacarIncidencia();
});

let botonPulsar = document.getElementById("mostrarIncidencia");

botonPulsar.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionSacarIncidencia();
});

function peticionSacarIncidencia() {
    const url = "./controlador/administrador/controladorIncidencias.php";
    fetch(url, {
        method: "POST",
    })
        .then(response => response.json())
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divHijo.classList.add("w-full2");
            divUnico.appendChild(divHijo);

            let encabezado = document.createElement("tr");
            encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
            encabezado.innerHTML = `
                <th>CLIENTE</th>
                <th>TRABAJADOR</th>
                <th>DISPOSITIVO</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>MOTIVO</th>
                <th>FECHA ALTA</th>
                <th>ESTADO</th>
                <th>INFORME</th>
                <th>FECHA CIERRE</th>`;
            divHijo.appendChild(encabezado);

            respuesta.forEach(apartado => {
                let fila = crearFila(apartado);
                divHijo.appendChild(fila);
            });
        });
}

function crearFila(apartado) {
    let fila = document.createElement("tr");
    fila.innerHTML = `
        <td>${apartado.nombreCliente}</td>
        <td>${apartado.nombreTrabajador}</td>
        <td>${apartado.dispositivo}</td>
        <td>${apartado.marca}</td>
        <td>${apartado.modelo}</td>
        <td>${apartado.motivo}</td>
        <td>${apartado.fechaAltaIncidencia}</td>
        <td>${apartado.estado}</td>
        <td>${apartado.infomeTecnico}</td>
        <td>${apartado.fechaCierreIncidencia}</td>`;
    return fila;
}

let botonFiltrarCliente = document.getElementById("botonFiltrarCliente");

botonFiltrarCliente.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = ''; // Vaciar el contenido del elemento
    }
    peticionMostrarCliente();
});



function peticionMostrarCliente() {
    const URL = "./controlador/administrador/controladorFiltrarCliente.php";

    let nombre = document.getElementById("filtrarCliente");
    var formularioNombre = new FormData(nombre);
    fetch(URL, {
        method: "POST",
        body: formularioNombre
    })
        .then(response => response.json())
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divHijo.classList.add( "w-full2");
            divUnico.appendChild(divHijo);
    

            let encabezado = document.createElement("tr");
        encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
        encabezado.innerHTML = `
       
           
            <th>NOMBRE Filtrado Cliente</th>
            <th>NOMBRE Filtrado TRABAJADO</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>fechaAltaIncidencia</th>
            <th>estado</th>
            <th>infomeTecnico</th>
            <th>fechaCierreIncidencia</th>
            `;
            divHijo.appendChild(encabezado);

                 const crearFila = (apartado) => {
            let fila = document.createElement("tr");
            fila.classList.add("border-t", "text-sm", "font-normal");
            fila.innerHTML = `
               
                <td>${apartado.nombreCliente}</td>
                <td>${apartado.nombreTrabajador}</td>
                <td>${apartado.dispositivo}</td>
                <td>${apartado.marca}</td>
                <td>${apartado.modelo}</td>
                <td>${apartado.motivo}</td>
                <td>${apartado.fechaAltaIncidencia}</td>
                <td>${apartado.estado}</td>
                <td>${apartado.infomeTecnico}</td>
                <td>${apartado.fechaCierreIncidencia}</td>
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
    



let botonFiltrarTrabajador = document.getElementById("botonFiltrarTrabajador");

botonFiltrarTrabajador.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionMostrarTrabajador();
});


function peticionMostrarTrabajador() {
    // alert("HULK");
    const URL = "./controlador/administrador/controladorFiltrarTrabajador.php";

    let provincia = document.getElementById("filtrarTrabajador");
    var formularioProvincia = new FormData(provincia);
    fetch(URL, {
        method: "POST",
        body: formularioProvincia
    })
        .then(response => response.json())
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divHijo.classList.add("w-full2");
            divUnico.appendChild(divHijo);
            let encabezado = document.createElement("tr");
            encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
            encabezado.innerHTML = `
              
         
            <th>NOMBRE Filtrado Cliente</th>
            <th>NOMBRE Filtrado TRABAJADO</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>fechaAltaIncidencia</th>
            <th>estado</th>
            <th>infomeTecnico</th>
            <th>fechaCierreIncidencia</th>
            
            `;
            divHijo.appendChild(encabezado);

       
        const crearFila = (apartado) => {
            let fila = document.createElement("tr");
            fila.classList.add("border-t", "text-sm", "font-normal");
            fila.innerHTML = `
                   
                <td>${apartado.nombreCliente}</td>
                <td>${apartado.nombreTrabajador}</td>
                <td>${apartado.dispositivo}</td>
                <td>${apartado.marca}</td>
                <td>${apartado.modelo}</td>
                <td>${apartado.motivo}</td>
                <td>${apartado.fechaAltaIncidencia}</td>
                <td>${apartado.estado}</td>
                <td>${apartado.infomeTecnico}</td>
                <td>${apartado.fechaCierreIncidencia}</td>
                
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
    


let botonFiltrarEstado = document.getElementById("botonFiltrarEstado");

botonFiltrarEstado.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionMostrarEstado();
});


function peticionMostrarEstado() {
    // alert("HULK");
    const URL = "./controlador/administrador/controladorFiltrarEstado.php";

    let estado = document.getElementById("filtrarEstado");
    var formularioEstado = new FormData(estado);
    fetch(URL, {
        method: "POST",
        body: formularioEstado
    })
        .then(response => response.json())
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divHijo.classList.add("-screen", "w-full2");
            divUnico.appendChild(divHijo);
            let encabezado = document.createElement("tr");
            encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
            encabezado.innerHTML = `


            
            <th>NOMBRE Filtrado Cliente</th>
            <th>NOMBRE Filtrado TRABAJADO</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>fechaAltaIncidencia</th>
            <th>estado</th>
            <th>infomeTecnico</th>
            <th>fechaCierreIncidencia</th>
           `;
            divHijo.appendChild(encabezado);
            const crearFila = (apartado) => {
                let fila = document.createElement("tr");
                fila.classList.add("border-t", "text-sm", "font-normal");
                fila.innerHTML = `
                  
                <td>${apartado.nombreCliente}</td>
                <td>${apartado.nombreTrabajador}</td>
                <td>${apartado.dispositivo}</td>
                <td>${apartado.marca}</td>
                <td>${apartado.modelo}</td>
                <td>${apartado.motivo}</td>
                <td>${apartado.fechaAltaIncidencia}</td>
                <td>${apartado.estado}</td>
                <td>${apartado.infomeTecnico}</td>
                <td>${apartado.fechaCierreIncidencia}</td>
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
    

let botonFiltrarMarca = document.getElementById("botonFiltrarMarca");

botonFiltrarMarca.addEventListener('click', (e) => {
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = '';
    }
    peticionMostrarMarca();
});


function peticionMostrarMarca() {
    // alert("HULK");
    const URL = "./controlador/administrador/controladorFiltrarMarca.php";

    let marca = document.getElementById("filtrarMarca");
    var formularioEstado = new FormData(marca);
    fetch(URL, {
        method: "POST",
        body: formularioEstado
    })
        .then(response => response.json())
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divHijo.classList.add( "w-full2");
            divUnico.appendChild(divHijo);
    
            let encabezado = document.createElement("tr");
            encabezado.classList.add("bg-gradient-to-tr", "from-indigo-600", "to-purple-600", "text-white", "font-bold", "text-md");
            encabezado.innerHTML = `
       
        <th>NOMBRE Filtrado Cliente</th>
        <th>NOMBRE Filtrado TRABAJADO</th>
        <th>dispositivo</th>
        <th>marca</th>
        <th>modelo</th>
        <th>motivo</th>
        <th>fechaAltaIncidencia</th>
        <th>estado</th>
        <th>infomeTecnico</th>
        <th>fechaCierreIncidencia</th>
    
        
        `;
            divHijo.appendChild(encabezado);
            const crearFila = (apartado) => {
                let fila = document.createElement("tr");
                fila.classList.add("border-t", "text-sm", "font-normal");
                fila.innerHTML = `
             
            <td>${apartado.nombreCliente}</td>
            <td>${apartado.nombreTrabajador}</td>
            <td>${apartado.dispositivo}</td>
            <td>${apartado.marca}</td>
            <td>${apartado.modelo}</td>
            <td>${apartado.motivo}</td>
            <td>${apartado.fechaAltaIncidencia}</td>
            <td>${apartado.estado}</td>
            <td>${apartado.infomeTecnico}</td>
            <td>${apartado.fechaCierreIncidencia}</td>
           
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
