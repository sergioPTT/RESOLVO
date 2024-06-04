<?php
include_once("./../../modelo/modeloSinContrato.php");
include_once("./../../modelo/modeloCliente.php");

//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //creo un objeto usuario
    $sinContrato = new SinContrato();

    //decimos que si se ha pasado por el input que tenemos escondido venimos de registrar 
    if (isset($_POST["sinContratoLimitado"])) {

        //reocgemos y limpiamos todos los valores 
        $dispositivo = limpiaString($_POST["dispositivo"]);
        $especializacion = limpiaString($_POST["dispositivo"]); // <- ¿Debería ser $_POST["especializacion"]?
        $marca = limpiaString($_POST["marca"]);
        $modelo = limpiaString($_POST["modelo"]);
        $motivo = limpiaString($_POST["motivo"]);

        session_start();
        $idCliente = $_SESSION['miId'];

        $respuesta = $sinContrato->insertarIncidenciaSinContrato($especializacion, $idCliente, $dispositivo, $marca, $modelo, $motivo);
        // echo "esta es la respuesta del sinContrato: " . $respuesta;
        switch ($respuesta) {
            case 0:
                $miArrayRespuesta = array(
                    'resultado' => "0",
                    'message' => 'SE HA HECHO LA INCIDENCIA'
                );
                break;
            case 1:
                $miArrayRespuesta = array(
                    'resultado' => "1",
                    'message' => 'TE HAS QUEDADO SIN NUM INCIDENCIAS'
                );
                break;
            case 2:
                $miArrayRespuesta = array(
                    'resultado' => "2",
                    'message' => 'ERROR 2'
                );
                break;
            case 3:
                $miArrayRespuesta = array(
                    'resultado' => "3",
                    'message' => 'No tenemos ningún trabajador disponible'
                );
                break;
        }

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
