<?php
include_once("./../../modelo/modeloCliente.php");


//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //creo un objeto usuario
    $cliente = new Cliente();


        //reocgemos y liempiamos todos los valores 
        $emailCliente = limpiaString($_POST["emailCliente"]);
       //echo "Este es el email del cliente: ".$emailCliente;
      


        $bajaCliente = $cliente->darDeBajaCliente($emailCliente);

        if ($bajaCliente) {
            $miArrayRespuesta = array(
                'resultado' => "si",
                'message' => 'El cliente fue dado de baja'
            );
            $respuestaFakeJson = json_encode($miArrayRespuesta);
            echo $respuestaFakeJson;
        } else {
            $miArrayRespuesta = array(
                'resultado' => "no",
                'message' => 'El cliente no fue dado de baja'
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
