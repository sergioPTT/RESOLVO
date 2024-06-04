<?php
include_once("./../../modelo/modeloTrabajador.php");

    $trabajador = new Trabajador();
  
    $codPostal=$_POST['codPostal'];
    $respuestaQuery=$trabajador->sacarTrabajadoresCodPostal($codPostal);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    