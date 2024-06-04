let botonSinContrato=document.getElementById("botonSinContrato");
botonSinContrato.addEventListener('click',(e)=>{
    e.preventDefault();
    peticionSinContrato();
});



function peticionSinContrato(){
    var InicioFormulario = new FormData(document.getElementById("formularioSinContrato"));
    
    const url = "./controlador/contrato/controladorSinContrato.php";
  debugger;
    fetch(url,{
        method: 'POST',
        body: InicioFormulario,
    })
    .then(response => response.json())
    .then(respuestaJson => {
    
      if (respuestaJson.resultado == "0") {
        // alert("SALIO BIEN");
          Swal.fire({
              icon: "success",
              title: "SE HIZO LA INICIDENCIA SIN CONTRATO",
              text: respuestaJson.message
            });

            let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
            botonSwal.id = 'miBotonSwal';
            document.getElementById('miBotonSwal').addEventListener('click', (e) => {
              e.preventDefault(); 
             window.location.href = 'index.php?vistaPrincipal';                                           
            });

      } else if (respuestaJson.resultado == "1") {
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
          }else {
        // alert("ERROR INESPERADO");

           Swal.fire({
           icon: 'error',
           title: "ERROR INESPERADO"
          });
            }
  })
    
}
