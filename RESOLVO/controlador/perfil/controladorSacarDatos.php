<?php
include_once("./../../modelo/modeloCliente.php");


//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //creo un objeto cliente
    $cliente = new Cliente();

   
        $email=limpiaString($_POST["emailCliente"]);
 
    //CLIENTE

  
  //TRABAJADOR
   


    //CLIENTE
      $datosCliente = $cliente->sacarDatosCliente($email);

      //TRABAJADOR
    //    $datosCliente = $cliente->sacarDatosTrabajador($email);

       
        if ($datosCliente) {
            
            $respuestaFakeJson = json_encode($datosCliente);
            echo $respuestaFakeJson;
        } else {
            $miArrayRespuesta = array(
                'resultado' => "no",
                'message' => 'Los datos del cliente no fueron sacados'
            );
            $respuestaFakeJson = json_encode($miArrayRespuesta);
            echo $respuestaFakeJson;
        }
}


function limpiaString($cadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $cadena);
    $string = trim($string);
    $string = stripslashes($string);
    $string = str_ireplace("<script>", "", $string);
    $string = str_ireplace("</script>", "", $string);
    $string = str_ireplace("<script src>", "", $string);
    $string = str_ireplace("<script type =>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1'='1", "", $string);
    $string = str_ireplace('OR "1"="1"', "", $string);
    $string = str_ireplace('OR ´1´=´1´', "", $string);
    $string = str_ireplace('is NULL; --', "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace("LIKE ´", "", $string);
    $string = str_ireplace("OR 'a'='a", "", $string);
    $string = str_ireplace('OR "a"="a"', "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR ´a´=´a´", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    return $string;
}
