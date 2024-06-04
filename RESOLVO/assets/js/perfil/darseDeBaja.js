let botonDarseDeBaja=document.getElementById("botonDarseDeBaja");

    botonDarseDeBaja.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({
            title: "¿Seguro que quieres darte de baja? Se perderán todos tus datos.",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // alert("Peticion de borrar al cliente");
                peticionDarseDeBaja();
            } else if (result.isDenied) {
                Swal.fire("No te diste de baja", "", "error");
            }
        });
    });


function peticionDarseDeBaja(){
    const formulario = new FormData(document.getElementById("formularioPerfil"));
    const url = "./controlador/perfil/ControladorPerfil.php";
    fetch(url, {
      method: 'POST',
      body: formulario,
    })
    .then(response => response.json())
    .then(respuestaJson => {
        if (respuestaJson.resultado === "si") {
            Swal.fire({
                icon: "success",
                title: "proceso hecho",
                text: respuestaJson.message
              });
              let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
              botonSwal.id = 'miBotonSwal';
              document.getElementById('miBotonSwal').addEventListener('click', (e) => {
                e.preventDefault();
                
                window.location.href = 'index.php?vistaLogout';
                
              });

        }else if(respuestaJson.resultado === "no"){
            alert("no eliminacion bbdd");
        }
    });
}

