<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RESOLVO</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
<!-- <link rel="stylesheet" href="./assets/css/iniciarSesion/cssVistaIniciarSesion.css">
<link rel="stylesheet" href="./assets/css/iniciarSesion/body.css"> -->
<!-- <style>

#contenedor {
  display: flex;
  align-items: center;
  justify-content: center;
  
  margin: 0;
  padding: 0;
  min-width: 100vw;
  min-height: 100vh;
  width: 100%;
  height: 100%;
}

#central {
  max-width: 320px;
  width: 100%;
}

.titulo {
  font-size: 250%;
  color:#bbe1fa;
  text-align: center;
  margin-bottom: 20px;
}

#login {
  width: 100%;
  padding: 50px 30px;
  background-color: #3282b8;
  
  -webkit-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
  -moz-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
  box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
  
  border-radius: 3px 3px 3px 3px;
  -moz-border-radius: 3px 3px 3px 3px;
  -webkit-border-radius: 3px 3px 3px 3px;
  
  box-sizing: border-box;
}

#login input {
  font-family: 'Overpass', sans-serif;
  font-size: 110%;
  color: #1b262c;
  
  display: block;
  width: 100%;
  height: 40px;
  
  margin-bottom: 10px;
  padding: 5px 5px 5px 10px;
  
  box-sizing: border-box;
  
  border: none;
  border-radius: 3px 3px 3px 3px;
  -moz-border-radius: 3px 3px 3px 3px;
  -webkit-border-radius: 3px 3px 3px 3px;
}

#login input::placeholder {
  font-family: 'Overpass', sans-serif;
  color: #E4E4E4;
}

#login button {
  font-family: 'Overpass', sans-serif;
  font-size: 110%;
  color:#1b262c;
  width: 100%;
  height: 40px;
  border: none;
  
  border-radius: 3px 3px 3px 3px;
  -moz-border-radius: 3px 3px 3px 3px;
  -webkit-border-radius: 3px 3px 3px 3px;
  
  background-color: #bbe1fa;
  
  margin-top: 10px;
}

#login button:hover {
  background-color: #0f4c75;
  color:#bbe1fa;
}

.pie-form {
  font-size: 90%;
  text-align: center;    
  margin-top: 15px;
}

.pie-form a {
  display: block;
  text-decoration: none;
  color: #bbe1fa;
  margin-bottom: 3px;
}

.pie-form a:hover {
  color: #0f4c75;
}

.inferior {
  margin-top: 10px;
  font-size: 90%;
  text-align: center;
}

.inferior a {
  display: block;
  text-decoration: none;
  color: #bbe1fa;
  margin-bottom: 3px;
}

.inferior a:hover {
  color: #3282b8;
}

</style> -->
<link href="dist/output.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet"> -->
<style>
* {
  font-family: sans-serif;
  font-weight: 400;
  font-style: normal;
}

.errorMensaje {
  color: red;
}

.bordeRojo {
  border: 3px solid red;
}

.bordeVerde {
  border: 3px solid #49ab49;
}

input {
  padding: 3%;
}
</style>
</head>

<body style="background-color: #dae8ff;">

<nav class="p-4 fixed top-0 left-0 w-full z-50" style="background-color: rgb(17, 24, 39);">
<div class="mx-0 flex items-center justify-between w-full">

<div class="flex items-center max-w-8">
<img src="./assets/img/resolvo.png" alt="Logo">
<span class="font-bold text-xl text-white ml-2">RESOLVO!</span>
</div>

<div class="flex space-x-4 pl-48">
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

<div class="flex space-x-4 justify-end mr-2">
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


<!------------------------------- ESTE ES EK INICIAR SESION NUEVO------------------- -->
<form id="formularioInicioSesion">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8" style="margin: 6%">
<div class="sm:mx-auto sm:w-full sm:max-w-sm">
<img class="mx-auto h-10 w-auto" src="./assets/img/resolvo.png" alt="Your Company">
<h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">INICIAR SESION
</h2>
</div>

<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
<form class="space-y-6" action="#" method="POST">
<div>
<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email </label>
<div class="mt-2">



<input type="email" id="email"
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
placeholder="e-mail" name="email" value="sergio.infor.le@gmail.com">
<i class="bx bx-user icon"></i>
<div id="email-error" class="error-message"></div>


</div>
</div>

<div style="margin-top: 10%">
<div class="flex items-center justify-between">
<label for="password" class="block text-sm font-medium leading-6 text-gray-900">CONTRASEÑA</label>
<div class="text-sm">
<a href="index.php?vistaCambiarPassword"
class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
</div>
</div>
<div class="mt-2">


<input type="password" id="password"
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
placeholder="contraseña" name="password" value="resolvo">
<div id="pass-error" class="error-message"></div>
<i class="bx bx-lock-alt icon"></i>
</div>
</div>
<input type="hidden" name="iniciarSesion" value="iniciarSesion">
<div>
<button type="submit" style="margin-top: 11%"
class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
value="SESION" id="botonEnviar">Sign
in </button>

</div>
</form>

<p class="mt-10 text-center text-sm text-gray-500">
¿No tienes cuenta?
<a href="index.php?vistaRegistrarse"
class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Registrate!!</a>
</p>
</div>
</div>
</form>
<!------------------------------- ESTE ES EK INICIAR SESION ANTIGUO------------------- -->








<!-- <div id="contenedor">
<div id="central">
<div id="login">
<div class="titulo">
Bienvenido
</div>
<form id="loginform">
<input type="text" name="usuario" placeholder="Usuario" required>

<input type="password" placeholder="Contraseña" name="password" required>

<button type="submit" title="Ingresar" name="Ingresar">Login</button>
</form>
<div class="pie-form">
<a href="#">¿Perdiste tu contraseña?</a>
<a href="#">¿No tienes Cuenta? Registrate</a>
</div>
</div>
<div class="inferior">
<a href="#">Volver</a>
</div>
</div>
</div> -->
<footer class="bg-gray-900 py-8">
<div class="container mx-auto px-4">
<div class="flex flex-wrap justify-between">
<div class="w-full text-white sm:w-1/3 lg:w-1/4 mb-6">
<h2 class=" text-lg font-bold mb-4">Your Company</h2>
<p>making better world wenlan yitani</p>
<div class="flex mt-4 space-x-4"><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-facebook"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-instagram"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-twitter"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-github"></i></a><a href="#" class="text-gray-300 hover:text-white"><i
class="fab fa-youtube"></i></a></div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="./assets/js/iniciarSesion/iniciarSesion.js"></script>


</body>

</html>