<?php
include_once("./../../modelo/modeloCliente.php");


//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// echo "HE LLEGADO AL CONTROLADOR PRINGAO";
    //creo un objeto cliente
    $cliente = new Cliente();

   
        $nombre=limpiaString($_POST["nombre"]);
        $apellidos=limpiaString($_POST["apellidos"]);
        $calle=limpiaString($_POST["calle"]);
        $codPostal=limpiaString($_POST["codPostal"]);
        $ciudad=limpiaString($_POST["ciudad"]);
        $provincia=limpiaString($_POST["provincia"]);
        $telefono=limpiaString($_POST["telefono"]);
        $dni=limpiaString($_POST["dni"]);
        $email=limpiaString($_POST["email"]);
      
        
 
        // echo"--".$nombre."--".$apellidos."--".$calle;
      $datosCliente = $cliente->guardarDatosCliente($nombre, $apellidos, $calle, $codPostal, $ciudad, $provincia, $telefono, $dni, $email);
//  echo "Esta es la query de Update:--".$datosCliente."--";

        if ($datosCliente) {
            
            $miArrayRespuesta = array(
                'resultado' => "si",
                'message' => 'Los datos del cliente  fueron guardados'
            );
            $respuestaFakeJson = json_encode($miArrayRespuesta);
            echo $respuestaFakeJson;
        } else {
            $miArrayRespuesta = array(
                'resultado' => "no",
                'message' => 'Los datos del cliente no fueron guardados'
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
