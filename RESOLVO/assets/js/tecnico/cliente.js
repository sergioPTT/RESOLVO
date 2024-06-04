document.addEventListener('DOMContentLoaded', ()=>{
    peticionSacarCliente();
});


// let botonMotrarCliente=document.getElementById("mostrarCliente");
// botonMotrarCliente.addEventListener('click',(e)=>{
//     e.preventDefault();
//     const elementoUnico = document.getElementById('unico');
//     if (elementoUnico) {
//         elementoUnico.innerHTML = ''; 
//     }
//     peticionSacarCliente();
//     alert("DOCTOR STRANGE");
// });

let lol=document.getElementById("mostrarClientes");
lol.addEventListener('click',(e)=>{e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = ''; 
    }
    peticionSacarCliente();})
    
    function peticionSacarCliente() {
        const url = "./controlador/tecnico/controladorTecnico.php";
        fetch(url, {
            method: "POST",
        })
        .then(response => response.json())
        .then(respuesta => {
            // alert("LOS CLIENTES SE HAN CARGADO");
            
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divUnico.appendChild(divHijo);
            
            let encabezado = document.createElement("tr");
            encabezado.innerHTML = `
            <th>id_Cliente</th>
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
            <th>idIncidencia</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>Fecha</th>
            <th>estado</th>
            `;
            divHijo.appendChild(encabezado);
            
            respuesta.forEach(apartado => {
                console.log(apartado);
                let fila = document.createElement("tr");
                fila.innerHTML = `
                <td>${apartado.idCliente}</td>
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
                <td>${apartado.idIncidencia}</td>
                <td>${apartado.dispositivo}</td>
                <td>${apartado.marca}</td>
                <td>${apartado.modelo}</td>
                <td>${apartado.motivo}</td>
                <td>${apartado.fechaAltaIncidencia}</td>
                <td>${apartado.estado}</td>
                `;
                divHijo.appendChild(fila);
            });
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
        });
    }
    
    
    let botonFiltrarNombre=document.getElementById("botonFiltrarNombre");
    
    botonFiltrarNombre.addEventListener('click',(e)=>{
        e.preventDefault();
        const elementoUnico = document.getElementById('unico');
        if (elementoUnico) {
            elementoUnico.innerHTML = ''; // Vaciar el contenido del elemento
        }
        peticionMostrarClienteNombre();
    });
    
    
    
    function  peticionMostrarClienteNombre() {
        // alert("HULK");
        const URL = "./controlador/tecnico/controladorFiltrarNombreCliente.php";
        
        let nombre = document.getElementById("filtrarNombre");
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
            divUnico.appendChild(divHijo);
            
            let encabezado = document.createElement("tr");
            encabezado.innerHTML = `
            <th>id_Cliente</th>
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
            <th>idIncidencia</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>Fecha</th>
            <th>estado</th>
            `;
            divHijo.appendChild(encabezado);
            if (Array.isArray(respuesta)) {
                respuesta.forEach(apartado => {
                    
                    let fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${apartado.idCliente}</td>
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
                    <td>${apartado.idIncidencia}</td>
                    <td>${apartado.dispositivo}</td>
                    <td>${apartado.marca}</td>
                    <td>${apartado.modelo}</td>
                    <td>${apartado.motivo}</td>
                    <td>${apartado.fechaAltaIncidencia}</td>
                    <td>${apartado.estado}</td>
                    `;
                    divHijo.appendChild(fila);
                });
            }else{
                var miArray = [];
                miArray.push(respuesta);
                miArray.forEach(apartado => {
                    console.log(apartado);
                    let fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${apartado.idCliente}</td>
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
                    <td>${apartado.idIncidencia}</td>
                    <td>${apartado.dispositivo}</td>
                    <td>${apartado.marca}</td>
                    <td>${apartado.modelo}</td>
                    <td>${apartado.motivo}</td>
                    <td>${apartado.fechaAltaIncidencia}</td>
                    <td>${apartado.estado}</td>
                    `;
                    divHijo.appendChild(fila);
                });
            }
            
        });
        
        
    }
    
    
    
    
    
    let botonFiltrarProvincia=document.getElementById("botonFiltrarProvincia");
    
    botonFiltrarProvincia.addEventListener('click',(e)=>{
        e.preventDefault();
        const elementoUnico = document.getElementById('unico');
        if (elementoUnico) {
            elementoUnico.innerHTML = ''; 
        }
        peticionMostrarClienteProvincia();
    });
    
    
    function  peticionMostrarClienteProvincia() {
        // alert("HULK");
        const URL = "./controlador/tecnico/controladorFiltrarProvinciaCliente.php";
        
        let provincia = document.getElementById("filtrarProvincia");
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
            divUnico.appendChild(divHijo);
            
            let encabezado = document.createElement("tr");
            encabezado.innerHTML = `
            <th>id_Cliente</th>
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
            <th>idIncidencia</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>Fecha</th>
            <th>estado</th>
            `;
            divHijo.appendChild(encabezado);
            if (Array.isArray(respuesta)) {
                respuesta.forEach(apartado => {
                    
                    let fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${apartado.idCliente}</td>
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
                    <td>${apartado.idIncidencia}</td>
                    <td>${apartado.dispositivo}</td>
                    <td>${apartado.marca}</td>
                    <td>${apartado.modelo}</td>
                    <td>${apartado.motivo}</td>
                    <td>${apartado.fechaAltaIncidencia}</td>
                    <td>${apartado.estado}</td>
                    `;
                    divHijo.appendChild(fila);
                });
            }else{
                var miArray = [];
                miArray.push(respuesta);
                miArray.forEach(apartado => {
                    console.log(apartado);
                    let fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${apartado.idCliente}</td>
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
                    <td>${apartado.idIncidencia}</td>
                    <td>${apartado.dispositivo}</td>
                    <td>${apartado.marca}</td>
                    <td>${apartado.modelo}</td>
                    <td>${apartado.motivo}</td>
                    <td>${apartado.fechaAltaIncidencia}</td>
                    <td>${apartado.estado}</td>
                    `;
                    divHijo.appendChild(fila);
                });
            }
            
        });
        
        
    }
    
    
    
    
    let botonFiltrarMarca=document.getElementById("botonFiltrarMarca");
    
    botonFiltrarMarca.addEventListener('click',(e)=>{
        e.preventDefault();
        const elementoUnico = document.getElementById('unico');
        if (elementoUnico) {
            elementoUnico.innerHTML = ''; 
        }
        peticionMostrarClienteMarca();
    });
    
    
    function  peticionMostrarClienteMarca() {
        // alert("HULK");
        const URL = "./controlador/tecnico/controladorFiltrarMarcaCliente.php";
        
        let marca = document.getElementById("filtrarMarca");
        var formularioMarca = new FormData(marca); 
        fetch(URL, {
            method: "POST",
            body: formularioMarca
        })
        .then(response => response.json()) 
        .then(respuesta => {
            
            
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divUnico.appendChild(divHijo);
            
            let encabezado = document.createElement("tr");
            encabezado.innerHTML = `
            <th>id_Cliente</th>
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
            <th>idIncidencia</th>
            <th>dispositivo</th>
            <th>marca</th>
            <th>modelo</th>
            <th>motivo</th>
            <th>Fecha</th>
            <th>estado</th>
            `;
            divHijo.appendChild(encabezado);
            if (Array.isArray(respuesta)) {
                respuesta.forEach(apartado => {
                    
                    let fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${apartado.idCliente}</td>
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
                    <td>${apartado.idIncidencia}</td>
                    <td>${apartado.dispositivo}</td>
                    <td>${apartado.marca}</td>
                    <td>${apartado.modelo}</td>
                    <td>${apartado.motivo}</td>
                    <td>${apartado.fechaAltaIncidencia}</td>
                    <td>${apartado.estado}</td>
                    `;
                    divHijo.appendChild(fila);
                });
            }else{
                var miArray = [];
                miArray.push(respuesta);
                miArray.forEach(apartado => {
                    console.log(apartado);
                    let fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${apartado.idCliente}</td>
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
                    <td>${apartado.idIncidencia}</td>
                    <td>${apartado.dispositivo}</td>
                    <td>${apartado.marca}</td>
                    <td>${apartado.modelo}</td>
                    <td>${apartado.motivo}</td>
                    <td>${apartado.fechaAltaIncidencia}</td>
                    <td>${apartado.estado}</td>
                    `;
                    divHijo.appendChild(fila);
                });
            }
            
        });
        
        
    }
    