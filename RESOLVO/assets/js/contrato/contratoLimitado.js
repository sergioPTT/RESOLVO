document.addEventListener('DOMContentLoaded', function () {
  // Coloca aquí tu código para agregar eventos a los elementos del DOM
  let botonPagar = document.getElementById("botonPagar");
  botonPagar.addEventListener('click', function (e) {
    e.preventDefault();
    peticionPagar();
  });
  
  
});

function peticionPagar() {
  var InicioFormulario = new FormData(document.getElementById("formularioContrato"));
  const url = "./controlador/contrato/controladorContratoLimitado.php";
  
  fetch(url, {
    method: 'POST',
    body: InicioFormulario,
    
  })
  .then(response => response.json())
  .then(respuestaJson => {
    
    if (respuestaJson.resultado == "0") {
      // alert("SALIO BIEN");
      Swal.fire({
        icon: "success",
        title: "BIEN",
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaContratoLimitado';
      });
      
    } else if (respuestaJson.resultado == "1") {
      // alert("ERROR 1");
      Swal.fire({
        icon: 'error',
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaContrato';
      });
    } else if (respuestaJson.resultado == "2") {
      alert("ERROR 2");
      Swal.fire({
        icon: 'error',
        title: "fallo",
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaContrato';
      });
    } else if (respuestaJson.resultado == "3") {
      alert("ERROR 2");
      Swal.fire({
        icon: 'error',
        title: "fallo",
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        
        // window.location.href = 'index.php?vistaContrato';
      });
    }else {
      // alert("ERROR INESPERADO");
      
      Swal.fire({
        icon: 'error',
        title: "NI IDEA DEL FALLO"
      });
    }
  })
  
}



let resultadoImagen = "sinImagen"; // Declarar la variable fuera de los eventos

const inputImagen = document.getElementById('imagen');
inputImagen.addEventListener('change', function () {
  // Obtiene el nombre del archivo seleccionado   
  if (this.files.length > 0) {
    resultadoImagen = this.files[0].name; // Actualizar el valor de resultadoImagen si se selecciona un archivo
    console.log("Este es mi archivo: " + resultadoImagen);
  } else {
    resultadoImagen = "sinImagen"; // Actualizar el valor de resultadoImagen si no se selecciona ningún archivo
    console.log("Este es mi archivo: " + resultadoImagen);
  }
});

let boton = document.getElementById("botonContratoLimitado");
boton.addEventListener('click', (e) => {
  e.preventDefault();
  peticionContratoLimitado(resultadoImagen); // Utilizar resultadoImagen aquí
});



function peticionContratoLimitado(resultadoImagen) {
  var InicioFormulario = new FormData(document.getElementById("formularioContratoLimitado"));
  InicioFormulario.append('imagenIncidencia', resultadoImagen);
  const url = "./controlador/contrato/controladorContratoLimitado.php";
  
  fetch(url, {
    method: 'POST',
    body: InicioFormulario,
  })
  .then(response => response.json())
  .then(respuestaJson => {
    
    if (respuestaJson.resultado == "0") {
      // alert("SALIO BIEN");
      Swal.fire({
        icon: "success",
        title: "BIEN",
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaPrincipal';
      });
      
    } else if (respuestaJson.resultado == "5") {
      // alert("SE ACABARON LAS INCIDENCIAS");
      Swal.fire({
        icon: 'error',
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaPrincipal';
        // window.location.href = 'index.php?vistaLogout';                                           
      });
    } else if (respuestaJson.resultado == "2") {
      // alert("ERROR 2");
      Swal.fire({
        icon: 'error',
        title: "fallo",
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaContrato';
      });
    } else if (respuestaJson.resultado == "3") {
      // alert("ERROR 2");
      Swal.fire({
        icon: 'error',
        title: "fallo",
        text: respuestaJson.message
      });
      
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = 'index.php?vistaContrato';
      });
      //  }else if (respuestaJson.resultado == "4") {
      //   //aqui en teoria no deberia entra 
      //   alert("SE ACABARON LAS INCIDENCIAS");
      //   Swal.fire({
      //       icon: 'error',
      //       title: "fallo",
      //       text: respuestaJson.message
      //      });
      
      //     let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      //     botonSwal.id = 'miBotonSwal';
      //     document.getElementById('miBotonSwal').addEventListener('click', (e) => {
      //       e.preventDefault(); 
      //      // window.location.href = 'index.php?vistaContrato';                                             
      //     });
    } else {
      // alert("ERROR INESPERADO");
      
      Swal.fire({
        icon: 'error',
        title: "ERROR INESPERADO"
      });
    }
  })
  
}
