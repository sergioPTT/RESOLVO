//mandar correo
const botonPruebaEmail = document.getElementById("botonPruebaEmail");

//mandar el correo para verificar si es el 




botonPruebaEmail.addEventListener('click', (e) => {
    e.preventDefault();
    enviarPruebaEmail();
    const divEmail = document.getElementById("divEmail");
   
    divEmail.classList.add("desaparecer");
    const divCodigo = document.getElementById("divCodigo");
    divCodigo.classList.remove("desaparecer");
    const botonCodigo = document.getElementById("botonEnviarCodigo");

    botonCodigo.addEventListener('click', (e) => {
        e.preventDefault();
      
       
        alert("Acabas de enviar el codigo");
        const codigoUsuario = document.getElementById("codigo").value;
        console.log("Hola");
        console.log("este es el codigo del cliente: ".codigoUsuario);
        const codigoRandom = document.getElementById("codigoRandom").value;
        console.log("este es mi codigo: ".codigoRandom);
        if (codigoUsuario == codigoRandom) {
            alert("El codigo que has puesto es el correcto");
            divCodigo.classList.add("desaparecer");
            const divPasswords = document.getElementById("divPasswords");
            divPasswords.classList.remove("desaparecer");



        } else {
            alert("el codigo no es el mismo");
        }

    });
});


function enviarPruebaEmail() {
    const formulario = new FormData(document.getElementById("formularioCambiarPassword"));
    const url = "./controlador/olvidarPassword/ControladorOlvidarPassword.php";

    fetch(url, {
        method: 'POST',
        body: formulario,
    })
        .then(response => response.json())
        .then(respuestaJson => {
            if (respuestaJson.resultado == "1") {
                //el usuario ha recibido un correo:
                alert("Todo bien");
            } else if (respuestaJson.resultado == "2") {
                alert("No fue bien");
            } else {
                alert("error critico");
            }

        });
}










//expresiones regulares de las contraseñas
document.getElementById('password').addEventListener('blur', validarContraseña);
document.getElementById('password2').addEventListener('blur', validarContraseña2);

let errorContraseña = "";
let errorContraseña2 = "";


function validarContraseña() {
    const inputPassword = document.getElementById('password');
    const contraseña = document.getElementById('password').value;
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
    const inputPassword2 = document.getElementById('password2');
    const contraseña2 = document.getElementById('password2').value;
    // const regexContraseña2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
     const regexContraseña2 =/^[a-zA-Z]{3,20}$/;
     
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
botonEnviar.addEventListener('click', (e) => {
    e.preventDefault();

    const errorCompleto = errorContraseña + errorContraseña2;
    const password = document.getElementById('password').value;
    const password2 = document.getElementById('password2').value;

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
    } else {
        Swal.fire({
            icon: "error",
            title: "Las contraseñas no son iguales",
            text: "Las contraseñas no son iguales",
        });
    }
})


function enviarRegistro() {
    const formulario = new FormData(document.getElementById("formularioCambiarPassword"));
    const url = "./controlador/registrarse/ControladorRegistrarse.php";
    console.log("hola2");
    fetch(url, {
        method: 'POST',
        body: formulario,
    })
        .then(response => response.json())
        .then(respuestaJson => {
            // alert("Tres");
            if (respuestaJson.resultado === "0") {
                // alert("SHOGUN");
                Swal.fire({
                    icon: "success",
                    title: "BIEN",
                    text: respuestaJson.message
                });
                let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
                botonSwal.id = 'miBotonSwal';
                document.getElementById('miBotonSwal').addEventListener('click', (e) => {
                    e.preventDefault();
                    alert("Dos");
                    window.location.href = 'index.php?vistaIniciarSesion';
                    alert("Uno");

                });
            } else if (respuestaJson.respuesta === "1") {
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
            } else {
                console.log("Hubo un fallo random en el proceso");
            }

        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
}
