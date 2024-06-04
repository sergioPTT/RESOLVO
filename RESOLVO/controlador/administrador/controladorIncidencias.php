<?php
include_once("./../../modelo/modeloIncidencia.php");

//comporbamos que se haya pasado por le metodo POST

    $incidencia = new Incidencia();
  
    $respuestaQuery=$incidencia->sacarIncidencia();
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    