<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RESOLVO</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
<!-- <link rel="stylesheet" href="./assets/css/cssContrato.css"> -->
<!-- <link rel="stylesheet" href="./assets/css/cssVistaPrincipalHeader.css"> -->
<link href="dist/output.css" rel="stylesheet">
<style>
* {
    font-family: "Poetsen One", sans-serif;
    font-weight: 400;
    font-style: normal;
}

body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    background-color: #dae8ff;
}
</style>
</head>

<body>
<!-- ----------------------ESTE ES EL INICIO DEL MENU -------------------------------->
<nav class="p-4 fixed top-0 left-0 w-full z-50" style="background-color: rgb(17, 24, 39);">
<div class="mx-0 flex items-center justify-between w-full"> <!-- Alineación centrada y ancho máximo -->
<!-- Logo and Brand Name -->
<div class="flex items-center max-w-8">
<img src="./assets/img/resolvo.png" alt="Logo">
<span class="font-bold text-xl text-white ml-2">RESOLVO!</span>
</div>
<!-- Navigation Links -->
<div class="flex space-x-4 pl-48"> <!-- No necesitas cambiar nada aquí -->
<?php
session_start();
if (isset($_SESSION["cargoTrabajador"])) {
    if ($_SESSION["cargoTrabajador"] == "tecnico") {
        echo '<div class="flex space-x-4">';
        echo '<a href="index.php?vistaVerIncidencias" class="text-gray-300 font-bold hover:text-white text-xl">VER INCIDENCIAS</a>';
        echo '<a href="index.php?vistaVerClientes" class="text-gray-300 font-bold hover:text-white text-xl">VER CLIENTES</a>';
        echo '</div>';
    } else if ($_SESSION["cargoTrabajador"] == "administrador") {
        echo '<div class="flex space-x-4">';
        echo '<a href="index.php?vistaVerIncidencias" class="text-gray-300 font-bold hover:text-white text-xl">VER INCIDENCIAS</a>';
        echo '<a href="index.php?vistaVerClientes" class="text-gray-300 font-bold hover:text-white text-xl">VER CLIENTES</a>';
        echo '<a href="index.php?vistaVerTecnicos" class="text-gray-300 font-bold hover:text-white text-xl">VER trabajadores</a>';
        echo '<a href="index.php?vistaVerTrabajadores" class="text-gray-300 font-bold hover:text-white text-xl">crear trabajador</a>';
        echo '</div>';
    }
} else {
    echo '<div class="flex space-x-4">';
    echo '   <a href="index.php?vistaPrincipal" class="text-gray-300 font-bold hover:text-white text-xl">Principal</a>';
    echo '  <a href="index.php?vistaConocenos" class="text-gray-300 font-bold hover:text-white text-xl">Conócenos</a>';
    echo '  <a href="index.php?vistaQueHacemos" class="text-gray-300 font-bold hover:text-white text-xl">Qué Hacemos</a>';
    echo '  <a href="index.php?vistaContrato" class="text-gray-300 font-bold hover:text-white text-xl">Contrato</a>';
    echo '  <a href="index.php?vistaContacto" class="text-gray-300 font-bold hover:text-white text-xl">Contacto</a>';
    echo '</div>';
}
?>
</div>
<!-- User Actions -->
<div class="flex space-x-4 justify-end mr-2"> <!-- Alineación a la derecha -->
<?php

if (isset($_SESSION["acceso"])) {
    echo '<div class="flex space-x-4 justify-end mr-2">';
    echo '<a href="index.php?vistaPerfil" class="text-white hover:text-white"><i class="far fa-user"></i></a>';
    echo "<a href='index.php?vistaLogout' class='text-white hover:text-white'>CERRAR SESIÓN CLIENTE</a>";
    echo '</div>';
} else if (isset($_SESSION["accesoTrabajador"])) {
    echo '<div class="flex space-x-4 justify-end mr-2">';
    echo '<a href="index.php?vistaPerfil" class="text-white font-bold hover:text-white"><i class="far fa-user"></i></a>';
    echo "<a href='index.php?vistaLogout' class='text-white font-bold hover:text-white'>CERRAR SESIÓN TRABAJADOR</a>";
    echo '</div>';
} else {
    echo '<div class="flex space-x-4 justify-end mr-2">';
    echo "<a href='index.php?vistaIniciarSesion' class='text-white font-bold hover:text-gray-500'>INICIAR SESIÓN</a>";
    echo "<a href='index.php?vistaRegistrarse' class='text-white font-bold hover:text-gray-500'>REGISTRARSE</a>";
    echo '</div>';
}
?>

</div>
</div>
</nav>

<!-- ----------------------ESTE ES EL FIN DEL MENU -------------------------------->








<!-- ESTA ES LA PARTE YA DEL BODY QYE DIGAMOS -->
<!-- ---------------------------------------ESTO SON TODOS LOS CASCOS POSIBLES DE LAS OPCIONES QUE TIENE EL CLIENTE---------------------------------------- -->

<?php
if (isset($_SESSION["acceso"])) {
    ?>
    <div style="    margin-top: 11%;
    margin-bottom: 11%;">
    <div>
    <?php
    
    // //Este if es cuando ya ha comprado por primera vez
    if (isset($_SESSION["intentosIncidencias"]) && ($_SESSION["intentosIncidencias"] > 0 && $_SESSION["intentosIncidencias"] <= 10)) {
       // echo "PRIMER IF";
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaContratoLimitado'>Hacer incidencia limitada CASO 1</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a></button>
        </div>
        <!-- <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a></button>
        </div> -->
        </section>
        </div>
        <?php
        // echo "<br>";
        // echo "<a href='index.php?vistaContratoLimitado'>Hacer incidencia limitada CASO 1</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a>";
        // echo "<br>";
        
        // echo "<a href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a>";
        
        //Cuando se ha quedado sin incidencias numIncidencias==0
    } else if (isset($_SESSION["intentosIncidencias"]) && $_SESSION["intentosIncidencias"] == 0) {
       // echo "SEGUNDO IF";
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPago'>Ir al Pago de contrato limitado</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a></button>
        </div>
        </section>
        </div>
        <?php
        // echo "<br>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a>";
    } else if (isset($_SESSION["intentosIncidencias"]) && $_SESSION["intentosIncidencias"] > 10) {
       // echo "TERCER IF";
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPago'>Ir al Pago de contrato limitado</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaContratoLimitado'>Hacer incidencia ILIMITADA</a></button>
        </div>
        <!-- <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaRegistrarse'>PLAN LIMITADO</a></button>
        </div> -->
        </section>
        </div>
        <?php
        // echo "<br>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaContratoLimitado'>Hacer incidencia ILIMITADA</a>";
        // echo "<br>";
        
        
    } else if (isset($_SESSION["contratoCliente"]) && ($_SESSION["contratoCliente"] == "noTiene")) {
      //  echo "CUARTO IF";
        
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPago'>Ir al Pago de contrato limitado</a></button>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a></button>
        
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a></button>
        </div>
        </section>
        </div>
        <?php
        // echo "<br>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a>";
    } else if (isset($_SESSION["contratoCliente"]) && (isset($_SESSION["numIncidenciasCliente"])) && ($_SESSION["contratoCliente"] == "limitado" && $_SESSION["numIncidenciasCliente"] == 0)) {
      //  echo "QUINTO IF";
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPago'>Ir al Pago de contrato limitado</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a></button>
        </div>
        </section>
        </div>
        <?php
        // echo "<br>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a>";
        
    } else if (isset($_SESSION["contratoCliente"]) && (isset($_SESSION["numIncidenciasCliente"])) && ($_SESSION["contratoCliente"] == "limitado" && $_SESSION["numIncidenciasCliente"] > 0)) {
       // echo "SEXTO IF";
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaContratoLimitado'>Hacer incidencia limitada CASO 1/a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a></button>
        </div>
        <!-- <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaRegistrarse'>PLAN LIMITADO</a></button>
        </div> -->
        </section>
        </div>
        <?php
        
        // echo "<br>";
        // echo "<a href='index.php?vistaContratoLimitado'>Hacer incidencia limitada CASO 1</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a>";
        // echo "<br>";
    } else {
      //  echo "SEPTIMO IF";
        ?>
        <div class="mb-10">
        <section class="flex justify-center space-x-6">
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
        <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ 5 incidencias al mes</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaPago'>Ir al Pago de contrato limitado</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
        <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
        <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
        class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
        popular</span>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Incidencias ilimitadas</li>
        <li>✔ Contacto con nuestras oficinas</li>
        <li>✔ Antivuris con este contrato</li>
        <li>✔ Asistencia 24/7</li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaContratoLimitado'>Hacer incidencia ILIMITADA</a></button>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md w-72">
        <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
        <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
        <ul class="mt-4 space-y-2 text-left">
        <li>✔ Cobro por numero de incidencia</li>
        <li>✔ Contacto con nuestras oficinas </li>
        
        </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
        href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a></button>
        </div>
        </section>
        </div>
        <?php
        // echo "<br>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaContratoLimitado'>Hacer incidencia ILIMITADA</a>";
        // echo "<br>";
        // echo "<a href='index.php?vistaSinContrato'>Hacer incidencia son contrato</a>";
    }
    ?>
    
    </div>
    
    <div>
    
    
    
    <?php
    //Este if es cuando ya ha comprado por primera vez-->
    if (isset($_SESSION["intentosIncidencias"]) && ($_SESSION["intentosIncidencias"] > 10)) {
        // echo "<a href='index.php?vistaContratoLimitado'>Hacer incidencia ILIMITADA CASO 3</a>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<a href='#'>Hacer incidencia son contrato</a>";
        
        //Cuando se ha quedado sin incidencias numIncidencias==0
    } else if (isset($_SESSION["intentosIncidencias"]) && $_SESSION["intentosIncidencias"] == 0) {
        // echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ILIMITADO</a>";
        // echo "<a href='index.php?vistaPago'>Ir al Pago de contrato limitado</a>";
        // echo "<a href='#'>Hacer incidencia son contrato</a>";
    }
    ?>
    </div>
    
    <!-- <div>
    <?php
    if (($_SESSION["contratoCliente"]) == "noTiene") {
        echo "<a href='index.php?vistaIniciarSesion'>Hacer incidencia sin contrato hola</a>";
    } else {
        echo "<a href='index.php?vistaPagoIlimitado'>Ir al Pago de contrato ilimitado</a>";
    }
    ?>
    </div> -->
    
    
    </div>
    <?php
} else {
    ?>
    <!-------------------------- ESTOS ES LA PARTE DE LOS CONTRATOS ------------------------>
    <section class="text-center py-12" style="margin-top: 4%">
    <h2 class="text-4xl font-bold">ESTOS SON LOS CONTRATOS</h2>
    <p class="mt-4 text-gray-600">Miralos y elige el que mas te guste!!</p>
    </section>
    <div class="mb-10">
    <section class="flex justify-center space-x-6" style="margin-bottom: 9%">
    <div class="bg-white p-6 rounded-lg shadow-md w-72">
    <h3 class="text-lg font-semibold">PLAN LIMITADO</h3>
    <p class="mt-2">10$<span class="text-sm text-gray-600">/mes</span></p>
    <ul class="mt-4 space-y-2 text-left">
    <li>✔ 5 incidencias al mes</li>
    <li>✔ Contacto con nuestras oficinas</li>
    <li>✔ Antivuris con este contrato</li>
    
    </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
    href='index.php?vistaRegistrarse'>PLAN LIMITADO</a></button>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md w-72 border-2 border-yellow-500">
    <h3 class="text-lg font-semibold">PLAN ILIMITADO</h3>
    <p class="mt-2">20$<span class="text-sm text-gray-600">/mes</span></p><span
    class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mt-1">Most
    popular</span>
    <ul class="mt-4 space-y-2 text-left">
    <li>✔ Incidencias ilimitadas</li>
    <li>✔ Contacto con nuestras oficinas</li>
    <li>✔ Antivuris con este contrato</li>
    <li>✔ Asistencia 24/7</li>
    
    </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
    href='index.php?vistaRegistrarse'>PLAN LIMITADO</a></button>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md w-72">
    <h3 class="text-lg font-semibold">SIN CONTRATO</h3>
    <p class="mt-2">5$<span class="text-sm text-gray-600">/mes</span></p>
    <ul class="mt-4 space-y-2 text-left">
    <li>✔ Cobro por numero de incidencia</li>
    <li>✔ Contacto con nuestras oficinas </li>
    
    </ul><button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><a
    href='index.php?vistaRegistrarse'>PLAN LIMITADO</a></button>
    </div>
    </section>
    </div>
    <!-------------------------- ESTOS ES LA PARTE FINAL DE LOS CONTRATOS ------------------------>
    <?php
}
?>


<!-- ESTA ES LA PARTE INICIAL  YA DEL FOOTER QYE DIGAMOS -->
<footer class="bg-gray-900 py-8">
<div class="container mx-auto px-4">
<div class="flex flex-wrap justify-between">
<div class="w-full text-white sm:w-1/3 lg:w-1/4 mb-6">
<h2 class=" text-lg font-bold mb-4">Your Company</h2>
<p>Making the world a better place through constructing elegant hierarchies.</p>
<div class="flex mt-4 space-x-4"><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-facebook"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-instagram"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-twitter"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-github"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-youtube"></i></a>
</div>
</div>
<div class="w-full sm:w-1/3 lg:w-1/4 mb-6">
<h2 class="text-white text-lg font-bold mb-4">Solutions</h2>
<ul>
<li><a href="#" class="text-gray-300 hover:text-white">Marketing</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Analytics</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Commerce</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Insights</a></li>
</ul>
</div>
<div class="w-full sm:w-1/3 lg:w-1/4 mb-6">
<h2 class="text-white text-lg font-bold mb-4">Support</h2>
<ul>
<li><a href="#" class="text-gray-300 hover:text-white">Pricing</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Documentation</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Guides</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">API Status</a></li>
</ul>
</div>
<div class="w-full sm:w-1/3 lg:w-1/4 mb-6">
<h2 class="text-white text-lg font-bold mb-4">Company</h2>
<ul>
<li><a href="#" class="text-gray-300 hover:text-white">About</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Blog</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Jobs</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Press</a></li>
<li><a href="#" class="text-gray-300 hover:text-white">Partners</a></li>
</ul>
</div>
</div>
<div class="mt-8 border-t border-gray-700 pt-6">
<p class="text-center text-gray-500">© 2020 Your Company, Inc. All rights reserved.</p>
</div>
</div>
</footer>

</body>

</html>