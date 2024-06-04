document.getElementById('email').addEventListener('blur',validarEmail);
document.getElementById('password').addEventListener('blur',validarPassword);

let ErrorEmail="";
let ErrorContraseña="";

function validarEmail(){
  const inputEmail = document.getElementById('email');
  const email = document.getElementById('email').value;
  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const elementoError = document.getElementById('email-error');
  
  if (!regexEmail.test(email) || email==="") {
    inputEmail.classList.remove("bordeVerde");
    inputEmail.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'Por favor, introduce una dirección de correo electrónico válida.';
    ErrorEmail = "No te olvides de llenar el correo electrónico";
  }     else {
    elementoError.textContent = '';
    ErrorEmail = "";
    inputEmail.classList.add("bordeVerde");
  }
}




function validarPassword(){
  const inputPassword = document.getElementById('password');
  const contraseña = document.getElementById('password').value;
  // const regexContraseña = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  const regexContraseña = /^[a-zA-Z]{3,20}$/;
  const elementoError = document.getElementById('pass-error');
  
  if (!regexContraseña.test(contraseña) || contraseña==="") {
    inputPassword.classList.remove("bordeVerde");
    inputPassword.classList.add("bordeRojo");
    elementoError.classList.add("errorMensaje");
    elementoError.textContent = 'La contraseña debe contener al menos 8 caracteres, incluyendo al menos una letra y un número.';
    ErrorContraseña = "No te olvides de llenar la contraseña";
  }     else {
    elementoError.textContent = '';
    ErrorContraseña = "";
    inputPassword.classList.add("bordeVerde");
  }
}



const botonEnviar = document.getElementById("botonEnviar");
botonEnviar.addEventListener('click',(e)=>{
  e.preventDefault();    
  
  const errorGrande = ErrorEmail + ErrorContraseña;
  if (errorGrande !== "") {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: errorGrande,
    });
  } else {
    peticionIniciarSesion();
  }
})



function peticionIniciarSesion(){
  
  var InicioFormulario = new FormData(document.getElementById("formularioInicioSesion"));
  // const url = "./controlador/iniciarSesion/controladorIniciarSesion.php";
  const url = "./controlador/registrarse/ControladorRegistrarse.php";
  
  fetch(url,{
    method: 'POST',
    body: InicioFormulario,
  })
  .then(response => response.json())
  .then(respuestaJson => {
    
    //ES LA PRIMERA VEZ QUE INICIA SESION
    if (respuestaJson.resultado === "0") {
      Swal.fire({
        icon: "success",
        title: "CASO 0",
        text: respuestaJson.message
      });
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        
        window.location.href = 'index.php?vistaCambiarPassword';
        
      });
    }
    
    //INICIO DE SESION CORRECTAMENTE
    else if (respuestaJson.resultado === "1") {
      Swal.fire({
        icon: "success",
        title: "CASO 1",
        text: respuestaJson.message
      });
      let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
      botonSwal.id = 'miBotonSwal';
      document.getElementById('miBotonSwal').addEventListener('click', (e) => {
        e.preventDefault();
        
        window.location.href = 'index.php?vistaPrincipal';
        
      });
      
      //LA CONTRASE NO COINCIDE
    } else if (respuestaJson.resultado === "2") {
      
      //  window.location.href = "./../index.php";
      Swal.fire({
        icon: "error",
        title: "CASO 2",
        text: respuestaJson.message
      });
      
      //NO SE ENCONTRO AL USUARIO
    }else if (respuestaJson.resultado === "3") {
      Swal.fire({
        icon: "error",
        title: "CASO 3",
        text: respuestaJson.message
      });
      
      
      //ERROR DESCONOCIDO
    }else if (respuestaJson.resultado === "4") {
      Swal.fire({
        icon: "error",
        title: "CASO 4",
        text: respuestaJson.message
      });
      
      //SI PASA POR AQUI MALO
    }else {
      Swal.fire({
        icon: 'error',
        title: "NI IDEA DEL FALLO"
      });
    }
  })
  
}
