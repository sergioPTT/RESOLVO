<?php
include_once("./../../modelo/modeloCliente.php");

//comporbamos que se haya pasado por le metodo POST

    $cliente = new Cliente();
  
    $respuestaQuery=$cliente->sacarCliente();
    $arrayClientes = Json_encode($respuestaQuery);
    echo $arrayClientes;
    

