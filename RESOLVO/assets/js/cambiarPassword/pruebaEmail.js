const botonPruebaEmail=document.getElementById("botonPruebaEmail");

botonPruebaEmail.addEventListener('click',(e)=>{
    e.preventDefault();
    enviarPruebaEmail();

});


function enviarPruebaEmail() {
    const formulario = new FormData(document.getElementById("formularioCambiarPassword"));
    const url = "./controlador/olvidarPassword/ControladorOlvidarPassword.php";
    console.log("hola2");
    fetch(url, {
        method: 'POST',
        body: formulario,
    })
        .then(response => response.json())
        .then(respuestaJson => {
            if (respuestaJson.resultado == "1") {
                alert("Todo bien");
        
              } else if (respuestaJson.resultado == "2") {
               
                alert("No fue bien");
               }else{
                alert("error critico");
               }

        });
    }
    