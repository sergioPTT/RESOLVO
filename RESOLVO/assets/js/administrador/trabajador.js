document.addEventListener('DOMContentLoaded', ()=>{
    peticionSacarTrabajador();
});


let botonPulsar=document.getElementById("mostrarTrabajador");

botonPulsar.addEventListener('click',(e)=>{
    e.preventDefault();
    const elementoUnico = document.getElementById('unico');
    if (elementoUnico) {
        elementoUnico.innerHTML = ''; 
    }
    peticionSacarTrabajador();
    })
    
    function peticionSacarTrabajador() {
        const url = "./controlador/administrador/controladorSacarTrabajador.php";
        fetch(url, {
            method: "POST",
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
           
            <th>nombre</th>
            <th>apellidos</th>
            <th>calle</th>
            <th>codPostal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Email</th>
            <th>fechaNacimiento</th>
            <th>cargo</th>
            <th>especializacion</th>
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
                <td>${apartado.fechaNacimiento}</td>
                <td>${apartado.cargo}</td>
                <td>${apartado.especializacion}</td>
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
    
    let botonFiltrarCodPostal=document.getElementById("botonFiltrarCodPostal");
    
    botonFiltrarCodPostal.addEventListener('click',(e)=>{
        e.preventDefault();
        const elementoUnico = document.getElementById('unico');
        if (elementoUnico) {
            elementoUnico.innerHTML = ''; // Vaciar el contenido del elemento
        }
           peticionMostrarCodPostal();
    });
    
    
    
    function  peticionMostrarCodPostal() {
        const URL = "./controlador/administrador/controladorFiltrarCodPostal.php";
        
        let codPostal = document.getElementById("filtrarCodPostal");
        var formularioCodPostal = new FormData(codPostal); 
        fetch(URL, {
            method: "POST",
            body: formularioCodPostal
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
           
            <th>nombre</th>
            <th>apellidos</th>
            <th>calle</th>
            <th>codPostal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Email</th>
            <th>fechaNacimiento</th>
            <th>cargo</th>
            <th>especializacion</th>
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
                    <td>${apartado.fechaNacimiento}</td>
                    <td>${apartado.cargo}</td>
                    <td>${apartado.especializacion}</td>
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

    
    
    //FILTRAR POR CARGO DEL TRABAJADOR:
    let botonFiltrarCargo=document.getElementById("botonFiltrarCargo");
    
    botonFiltrarCargo.addEventListener('click',(e)=>{
        e.preventDefault();
        const elementoUnico = document.getElementById('unico');
        if (elementoUnico) {
            elementoUnico.innerHTML = ''; // Vaciar el contenido del elemento
        }
           peticionMostrarCargo();
    });
    
    
    
    function  peticionMostrarCargo() {
        const URL = "./controlador/administrador/controladorFiltrarCargo.php";
        
        let codCargo = document.getElementById("filtrarCargo");
        var formularioCargo= new FormData(codCargo); 
        fetch(URL, {
            method: "POST",
            body: formularioCargo
        })
        .then(response => response.json()) 
        .then(respuesta => {
            let divUnico = document.querySelector("#unico");
            let divHijo = document.createElement("table");
            divHijo.setAttribute("border", "2");
            divHijo.classList.add("-screen", "2");
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
            <th>fechaNacimiento</th>
            <th>cargo</th>
            <th>especializacion</th>
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
                    <td>${apartado.fechaNacimiento}</td>
                    <td>${apartado.cargo}</td>
                    <td>${apartado.especializacion}</td>
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
   
        
    //FILTRAR POR especializacion DEL TRABAJADOR:
    let botonFiltrarEspecializacion=document.getElementById("botonFiltrarEspecializacion");
    
    botonFiltrarEspecializacion.addEventListener('click',(e)=>{
        e.preventDefault();
        const elementoUnico = document.getElementById('unico');
        if (elementoUnico) {
            elementoUnico.innerHTML = '';
        }
           peticionMostrarEspecializacion();
    });
    
    
    
    function  peticionMostrarEspecializacion() {
        const URL = "./controlador/administrador/controladorFiltrarEspecializacion.php";
        
        let especializacion = document.getElementById("filtrarEspecializacion");
        var formularioEspecializacion= new FormData(especializacion); 
        fetch(URL, {
            method: "POST",
            body: formularioEspecializacion
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
           
            <th>nombre</th>
            <th>apellidos</th>
            <th>calle</th>
            <th>codPostal</th>
            <th>Ciudad</th>
            <th>Provincia</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Email</th>
            <th>fechaNacimiento</th>
            <th>cargo</th>
            <th>especializacion</th>
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
                    <td>${apartado.fechaNacimiento}</td>
                    <td>${apartado.cargo}</td>
                    <td>${apartado.especializacion}</td>
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
        