<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESOLVO</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <!-- <link rel="stylesheet" href="./assets/css/registrarse/cssRegistrarse.css">
<link rel="stylesheet" href="./assets/css/registrarse/body.css"> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <link href="dist/output.css" rel="stylesheet">
  <style>
    .otro {
      border: 2px solid red;
    }

    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      background-color: #dae8ff;
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

<body>
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
  <!-- <center>
<h1 class="tituloRegister">REGISTRATE!!</h1>

<form id="formularioRegistrarse" class="formularioRegistro">
<div class="login_box">


<div class="input_box">
<input type="text" id="user" class="input-field" placeholder="Nombre" name="nombre" value="sergio">
<i class="bx bx-user icon"></i>
<div id="user-error" class="error-message"></div>
</div>

<div class="input_box">
<input type="text" id="apellido" class="input-field" placeholder="Apellido" name="apellido" value="paredes">
<i class="bx bx-user icon"></i>
<div id="apellido-error" class="error-message"></div>
</div>

<div class="input_box">
<input type="text" id="direccion" class="input-field" placeholder="calle/avenida/plaza" name="direccion"
value="callle">
<i class="bx bx-user icon"></i>
<div id="direccion-error" class="error-message"></div>
</div>

<div class="input_box">
<input type="number" id="Codigo-Postal" class="input-field" placeholder="Codigo Postal" name="codigo"
value="12365">
<i class="bx bx-user icon"></i>
<div id="codigo-postal-error" class="error-message"></div>
</div>


<div class="input_box">
<input type="text" id="ciudad" class="input-field" placeholder="Ciudad" name="ciudad" value="Alcorcon">
<i class="bx bx-user icon"></i>
<div id="ciudad-error" class="error-message"></div>
</div>

<div class="input_box">
<input type="text" id="provincia" class="input-field" placeholder="Provincia" name="provincia" value="Madrid">
<i class="bx bx-user icon"></i>
<div id="provincia-error" class="error-message"></div>
</div>


<div class="input_box">
<input type="number" id="telefono" class="input-field" placeholder="NºTelefono" name="telefono"
value="123456789">
<i class="bx bx-user icon"></i>
<div id="telefono-error" class="error-message"></div>
</div>


<div class="input_box">
<input type="text" id="dni" class="input-field" placeholder="DNI" name="dni" value="48596871L">
<i class="bx bx-user icon"></i>
<div id="dni-error" class="error-message"></div>
</div>

<div class="input_box">
<input type="text" id="email" class="input-field" placeholder="email" name="email" value="as@as.com">
<i class="bx bx-user icon"></i>
<div id="email-error" class="error-message"></div>
</div>



<div class="input_box">
<input type="text" id="pass" class="input-field" placeholder="contraseña" name="password" value="resolvo">
<i class="bx bx-lock-alt icon"></i>
<div id="pass-error" class="error-message"></div>
</div>

<div class="input_box">
<input type="text" id="pass2" class="input-field" placeholder=" Repetir contraseña" name="password2"
value="resolvo">
<i class="bx bx-lock-alt icon"></i>
<div id="pass2-error" class="error-message"></div>
</div>

<input type="hidden" name="registrar" value="registrar">

<div class="input_box">
<input type="submit" class="input-submit" value="Registro" id="botonEnviar">
</div>
</div>
</form>
</center> -->

  <!-- ESTE ES EL INICIO DEL FORMULARIO DE Registro-->
  <form id="formularioRegistrarse">
    <!-- //TITULO REGISTRARSE -->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8" style="margin: 4%">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="./assets/img/resolvo.png" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">REGISTRARSE
        </h2>
      </div>
      <!-- ---------------------//NOMBRE----------- -->
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
          <div>
            <div class="mt-2">
              <input type="text" id="user"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Nombre" name="nombre" value="Moon">
              <i class="bx bx-user icon"></i>
              <div id="user-error" class="error-message"></div>
            </div>
          </div>

          <!-- //APELLIDO -->
          <div>
            <div class="mt-2">
              <input type="text" id="apellido"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Apellido" name="apellido" value="Knight">
              <i class="bx bx-user icon"></i>
              <div id="apellido-error" class="error-message"></div>
            </div>
          </div>

          <!-- //DIRECCION -->
          <div>
            <div class="mt-2">
              <input type="text" id="direccion"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="direccion/avenida/plaza" name="direccion" value="Egipto 17">
              <i class="bx bx-user icon"></i>
              <div id="direccion-error" class="error-message"></div>
            </div>
          </div>

          <!-- //codigo postal -->
          <div>
            <div class="mt-2">
              <input type="number" id="Codigo-Postal"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="codigo postal" name="codigo" value="14896">
              <i class="bx bx-user icon"></i>
              <div id="codigo-postal-error" class="error-message"></div>
            </div>
          </div>

          <!-- //CIUDAD -->
          <div>
            <div class="mt-2">
              <input type="ciudad" id="ciudad"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="ciudad" name="ciudad" value="El cairo">
              <i class="bx bx-user icon"></i>
              <div id="ciudad-error" class="error-message"></div>
            </div>
          </div>


          <!-- //PROVINCIA -->
          <div>
            <div class="mt-2">
              <input type="provincia" id="provincia"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="provincia" name="provincia" value="El cairo">
              <i class="bx bx-user icon"></i>
              <div id="provincia-error" class="error-message"></div>
            </div>
          </div>

          <!-- //telefono -->
          <div>
            <div class="mt-2">
              <input type="telefono" id="telefono"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="telefono" name="telefono" value="665588963">
              <i class="bx bx-user icon"></i>
              <div id="telefono-error" class="error-message"></div>
            </div>
          </div>

          <!-- //DNI -->
          <div>
            <div class="mt-2">
              <input type="dni" id="dni"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="dni" name="dni" value="47896532k">
              <i class="bx bx-user icon"></i>
              <div id="dni-error" class="error-message"></div>
            </div>
          </div>

          <!-- ----------//email---------------- -->
          <div>
            <div class="mt-2">
              <input type="email" id="email"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="e-mail" name="email" value="6as@as.com">
              <i class="bx bx-user icon"></i>
              <div id="email-error" class="error-message"></div>
            </div>
          </div>

          <!-------------- //password---------------- -->

          <div class="flex items-center justify-between">
          </div>
          <div class="mt-2">
            <input type="password" id="pass"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              placeholder="pass" name="password" value="resolvo">
            <div id="pass-error" class="error-message"></div>
            <i class="bx bx-lock-alt icon"></i>
          </div>



          <!-- ------------//password2---------------- -->

          <div class="flex items-center justify-between">
          </div>
          <div class="mt-2">
            <input type="password" id="pass2"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              placeholder="contraseña2" name="password2" value="resolvo">
            <div id="pass2-error" class="error-message"></div>
            <i class="bx bx-lock-alt icon"></i>
          </div>





          <input type="hidden" name="registrar" value="iniciarSesion">


          <div>
            <button type="submit" style="margin-top: 11%"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              value="SESION" id="botonEnviar">Sign
              up </button>

          </div>
        </form>


        <p class="mt-10 text-center text-sm text-gray-500">
          Registrate y podras realizar inicidencias

        </p>
      </div>
    </div>
  </form>
  <!--ESTE ES EL FIN DEL FORMULARIO DE REGSITRO -->


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
  <script src="./assets/js/registrarse/registrarse.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>