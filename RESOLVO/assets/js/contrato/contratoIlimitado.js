document.addEventListener('DOMContentLoaded', function() {
    // Coloca aquí tu código para agregar eventos a los elementos del DOM
    let botonPagar = document.getElementById("botonPagarIlimitado");
    botonPagar.addEventListener('click', function(e) {
        e.preventDefault();
        peticionPagar();
    });
  
  
  });
  
  function peticionPagar(){
    var InicioFormulario = new FormData(document.getElementById("formularioContrato"));
     const url = "./controlador/contrato/controladorContratoLimitado.php";
    
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
                  title: "BIEN",
                  text: respuestaJson.message
                });
  
                let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
                botonSwal.id = 'miBotonSwal';
                document.getElementById('miBotonSwal').addEventListener('click', (e) => {
                  e.preventDefault(); 
                 
                  //Cuando le de a comprar que le envie un email con los datos del contrato que ha comprado
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
           } else {
            // alert("ERROR INESPERADO");
  
               Swal.fire({
               icon: 'error',
               title: "NI IDEA DEL FALLO"
              });
                }
      })
      
  }
  
  
  
  let boton=document.getElementById("botonContratoLimitado");
  boton.addEventListener('click',(e)=>{
      e.preventDefault();
      peticionContratoLimitado();
  });
  
  
  
  function peticionContratoLimitado(){
      var InicioFormulario = new FormData(document.getElementById("formularioContratoLimitado"));
      
      const url = "./controlador/contrato/controladorContratoLimitado.php";
    
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
                title: "BIEN",
                text: respuestaJson.message
              });
  
              let botonSwal = document.querySelector('.swal2-confirm.swal2-styled');
              botonSwal.id = 'miBotonSwal';
              document.getElementById('miBotonSwal').addEventListener('click', (e) => {
                e.preventDefault(); 
                window.location.href = 'index.php?vistaPrincipal';                                           
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
           }else if (respuestaJson.resultado == "4") {
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
            }else {
          // alert("ERROR INESPERADO");
  
             Swal.fire({
             icon: 'error',
             title: "ERROR INESPERADO"
            });
              }
    })
      
  }
  