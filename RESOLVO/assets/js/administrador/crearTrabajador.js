


//AQUI ESTA LA PARTE DONDE EL ADMINISTRADOR CREA UN TRABAJADOR
//HACEMOS COMPROBACIONES DE LOS CAMPOS PARAQUE EL ADMIN NO META NADA INCORRECTO
document.getElementById('nombre').addEventListener('blur', validarNombre);
document.getElementById('apellido').addEventListener('blur', ValidarApellido);
document.getElementById('calle').addEventListener('blur', validarCalle);
document.getElementById('codPostal').addEventListener('blur', validarCodigoPostal);
document.getElementById('ciudad').addEventListener('blur', validarCiudad);
document.getElementById('provincia').addEventListener('blur', validarProvincia);
document.getElementById('telefono').addEventListener('blur', validarTelefono);
document.getElementById('dni').addEventListener('blur', validarDni);
// document.getElementById('email').addEventListener('blur', validarEmail);
document.getElementById('fechaNacimiento').addEventListener('blur', validarFechaNacimiento);
// document.getElementById('password').addEventListener('blur', validarContraseña);


let errorNombre = "";
let errorApellido ="";
let errorCalle = "";
let errorCodigoPostal = "";
let errorCiudad="";
let errorProvincia="";
let errorTelefono = "";
let errorDni="";
let errorEmail="";
let fechaNacimienot="";
let errorPassword = "";






function validarNombre() {
  
  const inputUser=document.getElementById('nombre');
  const nombre = document.getElementById('nombre').value;
  const regexNombre = /^[a-zA-Z]{3,20}$/;
  const elementoError = document.getElementById('user-error');
  
  if (!regexNombre.test(nombre)) {
    inputUser.classList.remove("bordeVerde");
    inputUser.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'El nombre debe contener letras y tener entre 3 y 20 caracteres.';
    errorNombre = " No te olvides de llenar el nombre ";
    
  } else {
    elementoError.textContent = '';
    errorNombre = "";
    inputUser.classList.add("bordeVerde");
    
  }
}

function ValidarApellido() {
  const inputApellido = document.getElementById('apellido');
  const apellido = document.getElementById('apellido').value;
  const regexApellido = /^[a-zA-Z]{3,20}$/;
  const elementoError = document.getElementById('apellido-error');
  
  if (!regexApellido.test(apellido)) {
    inputApellido.classList.remove("bordeVerde");
    inputApellido.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'El apellido debe contener letras y tener entre 3 y 20 caracteres.';
    errorApellido = " No te olvides de llenar el apellido ";
  } else {
    elementoError.textContent = '';
    errorApellido = "";
    inputApellido.classList.add("bordeVerde");
  }
}

function validarCalle() {
  const inputCalle = document.getElementById('calle');
  const calle = document.getElementById('calle').value;
  const regexCalle = /^[a-zA-Z0-9\s]{1,50}$/;
  const elementoError = document.getElementById('calle-error');
  
  if (!regexCalle.test(calle)) {
    inputCalle.classList.remove("bordeVerde");
    inputCalle.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La calle debe contener caracteres alfanuméricos y tener máximo 50 caracteres.';
    errorCalle = " No te olvides de llenar la calle ";
  } else {
    elementoError.textContent = '';
    errotCalle = "";
    inputCalle.classList.add("bordeVerde");
  }
}    

function validarCodigoPostal() {
  const inputCodigoPostal = document.getElementById('codPostal');
  const codigoPostal = document.getElementById('codPostal').value;
  const regexCodigoPostal = /^\d{5}$/;
  const elementoError = document.getElementById('codigo-postal-error');
  
  if (!regexCodigoPostal.test(codigoPostal)) {
    inputCodigoPostal.classList.remove("bordeVerde");
    inputCodigoPostal.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'El código postal debe contener 5 dígitos.';
    errorCodigoPostal = " No te olvides de llenar el código postal ";
  } else {
    elementoError.textContent = '';
    errorCodigoPostal = ""; 
    inputCodigoPostal.classList.add("bordeVerde");
  }
}


function validarCiudad() {
  const inputCiudad=document.getElementById('ciudad');
  const ciudad = document.getElementById('ciudad').value;
  const regexCiudad = /^[a-zA-Z\s-]+$/;
  const elementoError = document.getElementById('ciudad-error');
  
  if (!regexCiudad.test(ciudad)) {
    inputCiudad.classList.remove("bordeVerde");
    inputCiudad.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La ciudad debe contener letras y al menos un caracter.';
    errorCiudad = " No te olvides de llenar la ciudad ";
    
  } else {
    elementoError.textContent = '';
    errorCiudad = "";
    inputCiudad.classList.add("bordeVerde");
    
  }
}


function validarProvincia() {
  const inputProvincia=document.getElementById('provincia');
  const provincia = document.getElementById('provincia').value;
  const regexProvincia =  /^[a-zA-Z\s-]+$/;
  const elementoError = document.getElementById('provincia-error');
  
  if (!regexProvincia.test(provincia)) {
    inputProvincia.classList.remove("bordeVerde");
    inputProvincia.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La debe contener letras y al menos un caracter.';
    errorProvincia = " No te olvides de llenar la Provincia ";
    
  } else {
    elementoError.textContent = '';
    errorProvincia = "";
    inputProvincia.classList.add("bordeVerde");
    
  }
}

function validarTelefono() {
  const inputTelefono = document.getElementById('telefono');
  const telefono = document.getElementById('telefono').value;
  const regexTelefono = /^\d{9}$/;
  const elementoError = document.getElementById('telefono-error');
  
  if (!regexTelefono.test(telefono)) {
    inputTelefono.classList.remove("bordeVerde");
    inputTelefono.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'El número de teléfono debe contener 9 dígitos.';
    errorTelefono = " No te olvides de llenar el número de teléfono ";
  } else {
    elementoError.textContent = '';
    errorTelefono = "";
    inputTelefono.classList.add("bordeVerde");
  }
}


function validarDni() {
  const inputDni = document.getElementById('dni');
  const dni = document.getElementById('dni').value;
  const regexDni = /^\d{8}[a-zA-Z]$/;
  const elementoError = document.getElementById('dni-error');
  
  if (!regexDni.test(dni)) {
    inputDni.classList.remove("bordeVerde");
    inputDni.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'El número de DNI debe contener 9 dígitos.';
    errorDni = " No te olvides de llenar el número del DNI ";
  } else {
    elementoError.textContent = '';
    errorDni = "";
    inputDni.classList.add("bordeVerde");
  }
}


function validarEmail() {
  const inputEmail = document.getElementById('email');
  const email = document.getElementById('email').value;
  const regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  const elementoError = document.getElementById('email-error');
  
  if (!regexEmail.test(email)) {
    inputEmail.classList.remove("bordeVerde");
    inputEmail.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'El Email no es correcto.';
    errorEmail = " No te olvides de llenar el Email ";
  } else {
    elementoError.textContent = '';
    errorDni = "";
    inputEmail.classList.add("bordeVerde");
  }
}



function validarFechaNacimiento() {
  const inputFechaNacimiento = document.getElementById('fechaNacimiento');
  const fechaNacimiento = document.getElementById('fechaNacimiento').value;
  const elementoError = document.getElementById('fechaNacimiento-error');
  
  const regexFechaNacimiento = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;
  
  const fechaActual = new Date();
  const fechaIngresada = new Date(fechaNacimiento);
  
  if (!regexFechaNacimiento.test(fechaNacimiento) || fechaIngresada > fechaActual) {
    inputFechaNacimiento.classList.remove("bordeVerde");
    inputFechaNacimiento.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La fecha de nacimiento debe estar en el formato YYYY-MM-DD y no puede ser una fecha futura.';
    errorFechaNacimiento = " Por favor ingresa una fecha de nacimiento válida ";
  } else {
    elementoError.textContent = '';
    errorFechaNacimiento = "";
    inputFechaNacimiento.classList.add("bordeVerde");
  }
}


const botonEnviar = document.getElementById("botonEnviar");
botonEnviar.addEventListener('click',(e)=>{
  e.preventDefault();
  const errorCompleto = errorNombre + errorApellido + errorCalle  + errorCalle  +errorCodigoPostal +errorCiudad+errorProvincia+ errorTelefono +errorDni + errorFechaNacimiento;
  //   const password = document.getElementById('pass').value;
  //   const password2 = document.getElementById('pass2').value;
  
  //   if (password === password2) {
  if (errorCompleto !== "") {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: errorCompleto,
    });
  } else {
    Swal.fire({
      icon: 'success',
      title: 'Éxito',
      text: "Registro exitoso",
    });
    enviarRegistro();
  }
  //   }else{
  //     Swal.fire({
  //         icon: "error",
  //         title: "Las contraseñas no son iguales",
  //         text: "Las contraseñas no son iguales",
  //     });
  //   }
})

function enviarRegistro(){
  
  const formulario = new FormData(document.getElementById("formularioCrearTrabajador"));
  const url = "./controlador/administrador/ControladorCrearTrabajador.php";
  // console.log("hola2");
  fetch(url, {
    method: 'POST',
    body: formulario,
  })
  .then(response => response.json())
  .then(respuestaJson => {
    
    //  if(respuestaJson.resultado === "email"){
    //   alert("El correo ya esta registrado en la bbdd");
    //   console.log("El correo ya esta registrado en la bbdd");
    
    //   Swal.fire({
    //     icon: "error",
    //     title: "Oops...",
    //     text: respuestaJson.message
    //   });
    //   const inputEmail = document.getElementById('email');
    //   inputEmail.classList.remove("bordeVerde");
    //   inputEmail.classList.add("bordeRojo");
    
    // }
    if (respuestaJson.resultado === "correcto") { 
      Swal.fire({
        icon: "success",
        title: "BIEN",
        text: respuestaJson.message
      });
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        // window.location.href = 'index.php?vistaIniciarSesion';
        
      });
    }else if (respuestaJson.respuesta === "fallo") { 
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: respuestaJson.message
      });
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        alert("El trabajador no se ha podido insertar en la bbdd");
        // window.location.href = "./../index.php";
        
      });
    }else {
      console.log("Hubo un fallo random en el proceso");
    }
    
  })
  .catch(error => {
    console.error('Error en la solicitud:', error);
  });
}

//COGER LOS DATOS DEL FORMULARIO DE CREACION DE UN NUEVO TRABAJADOR
//  let botonCrearTrabajador=document.getElementById("formularioCrearTrabajador");

//  botonCrearTrabajador.addEventListener('click',(e)=>{
//      e.preventDefault(); 
//      const elementoUnico = document.getElementById('unico');
//      if (elementoUnico) {
//          elementoUnico.innerHTML = '';
//      }
//         peticionCrearTrabajdor();
//  });


