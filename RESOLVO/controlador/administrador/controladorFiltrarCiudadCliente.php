<?php
include_once("./../../modelo/modeloCliente.php");
    $cliente = new Cliente();
    $ciudad = $_POST['ciudad'];
    $respuestaQuery=$cliente->sacarClienteCiudad($ciudad);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    