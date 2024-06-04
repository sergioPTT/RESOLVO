document.getElementById('user').addEventListener('blur', validarNombre);
document.getElementById('apellido').addEventListener('blur', ValidarApellido);
document.getElementById('direccion').addEventListener('blur', validarDireccion);
document.getElementById('Codigo-Postal').addEventListener('blur', validarCodigoPostal);
document.getElementById('ciudad').addEventListener('blur', validarCiudad);
document.getElementById('provincia').addEventListener('blur', validarProvincia);
document.getElementById('telefono').addEventListener('blur', validarTelefono);
document.getElementById('dni').addEventListener('blur', validarDni);
document.getElementById('email').addEventListener('blur', validarEmail);
document.getElementById('pass').addEventListener('blur', validarContraseña);
document.getElementById('pass2').addEventListener('blur', validarContraseña2);


let errorNombre = "";
let errorApellido ="";
let errorDireccion = "";
let errorCodigoPostal = "";
let errorCiudad="";
let errorProvincia="";
let errorTelefono = "";
let errorDni="";
let errorEmail="";
let errorContraseña = "";
let errorContraseña2 = "";




function validarNombre() {
  const inputUser=document.getElementById('user');
  const nombre = document.getElementById('user').value;
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

function validarDireccion() {
  const inputDireccion = document.getElementById('direccion');
  const direccion = document.getElementById('direccion').value;
  const regexDireccion = /^[a-zA-Z0-9\s]{1,50}$/;
  const elementoError = document.getElementById('direccion-error');
  
  if (!regexDireccion.test(direccion)) {
    inputDireccion.classList.remove("bordeVerde");
    inputDireccion.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La dirección debe contener caracteres alfanuméricos y tener máximo 50 caracteres.';
    errorDireccion = " No te olvides de llenar la dirección ";
  } else {
    elementoError.textContent = '';
    errorDireccion = "";
    inputDireccion.classList.add("bordeVerde");
  }
}

// function validarCodigoPostal() {
//   const inputCodigoPostal = document.getElementById('codigoPostal');
//   const codigoPostal = document.getElementById('codigoPostal').value;
//   const regexCodigoPostal = /^\d{5}$/;
//   const elementoError = document.getElementById('codigoPostal-error');

//   if (!regexCodigoPostal.test(codigoPostal)) {
//     inputCodigoPostal.classList.remove("bordeVerde");
//     inputCodigoPostal.classList.add("bordeRojo");
//     elementoError.classList.add("errorMensaje");
//     elementoError.textContent = 'El número del codigo postal debe contener 5 dígitos.';
//     errorCodigoPostal = " No te olvides de llenar el número del codigo postal ";
//   } else {
//     elementoError.textContent = '';
//     errorCodigoPostal = "";
//     inputCodigoPostal.classList.add("bordeVerde");
//   }
// }


function validarCodigoPostal() {
  const inputCodigoPostal = document.getElementById('Codigo-Postal');
  const codigoPostal = document.getElementById('Codigo-Postal').value;
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






function validarContraseña() {
  const inputPassword = document.getElementById('pass');
  const contraseña = document.getElementById('pass').value;
  // const regexContraseña = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  const regexContraseña = /^[a-zA-Z]{3,20}$/;
  const elementoError = document.getElementById('pass-error');
  
  if (!regexContraseña.test(contraseña)) {
    inputPassword.classList.remove("bordeVerde");
    inputPassword.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La contraseña debe contener al menos 8 caracteres, incluyendo al menos una letra y un número.';
    errorContraseña = " No te olvides de llenar la contraseña ";
  } else {
    elementoError.textContent = '';
    errorContraseña = "";
    inputPassword.classList.add("bordeVerde");
  }
}


function validarContraseña2() {
  const inputPassword2 = document.getElementById('pass2');
  const contraseña2 = document.getElementById('pass2').value;
  // const regexContraseña2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  const regexContraseña2 = /^[a-zA-Z]{3,20}$/;
  const elementoError = document.getElementById('pass2-error');
  
  if (!regexContraseña2.test(contraseña2)) {
    inputPassword2.classList.remove("bordeVerde");
    inputPassword2.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La contraseña debe contener al menos 8 caracteres, incluyendo al menos una letra y un número.';
    errorContraseña2 = " No te olvides de llenar la contraseña ";
  } else {
    elementoError.textContent = '';
    errorContraseña2 = "";
    inputPassword2.classList.add("bordeVerde");
  }
}


const botonEnviar = document.getElementById("botonEnviar");
botonEnviar.addEventListener('click',(e)=>{
  e.preventDefault();
  const errorCompleto = errorNombre + errorApellido  + errorDireccion  +errorCodigoPostal +errorCiudad+errorProvincia+ errorTelefono +errorDni + errorEmail + errorContraseña + errorContraseña2;
  const password = document.getElementById('pass').value;
  const password2 = document.getElementById('pass2').value;
  
  if (password === password2) {
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
  }else{
    Swal.fire({
      icon: "error",
      title: "Las contraseñas no son iguales",
      text: "Las contraseñas no son iguales",
    });
  }
})

function enviarRegistro(){
  
  const formulario = new FormData(document.getElementById("formularioRegistrarse"));
  const url = "./controlador/registrarse/ControladorRegistrarse.php";
  console.log("hola2");
  fetch(url, {
    method: 'POST',
    body: formulario,
  })
  .then(response => response.json())
  .then(respuestaJson => {
    if(respuestaJson.resultado === "email"){
      alert("El correo ya esta registrado en la bbdd");
      console.log("El correo ya esta registrado en la bbdd");
      
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: respuestaJson.message
      });
      const inputEmail = document.getElementById('email');
      inputEmail.classList.remove("bordeVerde");
      inputEmail.classList.add("bordeRojo");
      
    } else if (respuestaJson.resultado === "correcto") { 
      Swal.fire({
        icon: "success",
        title: "BIEN",
        text: respuestaJson.message
      });
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        alert("Se registro correctamente al usuario");
        window.location.href = 'index.php?vistaIniciarSesion';
        
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
        alert("El usuario no se ha podido insertar en la bbdd");
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
