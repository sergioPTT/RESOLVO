<?php
include_once("./../../modelo/modeloTrabajador.php");

    $trabajador = new Trabajador();
  
    $cargo=$_POST['cargo'];
    $respuestaQuery=$trabajador->sacarTrabajadoresCargo($cargo);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    