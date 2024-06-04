<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESOLVO</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <link href="dist/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-blue-100 flex flex-col min-h-screen">
  <nav class="p-4 fixed top-0 left-0 w-full z-50" style="background-color: rgb(17, 24, 39);">
    <div class="mx-0 flex items-center justify-between w-full">
      <!-- Logo and Brand Name -->
      <div class="flex items-center max-w-8">
        <img src="./assets/img/resolvo.png" alt="Logo">
        <span class="font-bold text-xl text-white ml-2">RESOLVO!</span>
      </div>
      <!-- Navigation Links -->
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
      <!-- User Actions -->
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
 
  <div class="flex-grow flex items-center justify-center" style="margin: 6% auto">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
      <div class="flex justify-center mb-4">
        <img src="./assets/img/resolvo.png" alt="Logo" class="w-16">
      </div>
      <h2 class="text-2xl font-bold text-center mb-6">Formulario de Incidencia</h2>
      <form method="POST" id="formularioContratoLimitado" class="space-y-4">
        <!-- <div>
          <label for="dispositivo" class="block text-gray-700">Dispositivo:</label>
          <select name="dispositivo" id="dispositivo" required class="w-full p-2 border border-gray-300 rounded">
            <option value="movil">Móvil</option>
            <option value="pc">PC</option>
            <option value="portatiles">Portátiles</option>
            <option value="electrodomesticos">Electrodomésticos</option>
            <option value="otro">Otro</option>
          </select>
        </div> -->

        <div>
          <label for="dispositivo" class="block text-gray-700">Dispositivo:</label>
          <input type="text" name="dispositivo" id="dispositivo" value="pc" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
          <label for="marca" class="block text-gray-700">Marca:</label>
          <input type="text" name="marca" id="marca" value="Iphone" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
          <label for="modelo" class="block text-gray-700">Modelo:</label>
          <input type="text" name="modelo" id="modelo" value="8 plus" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div>
          <label for="motivo" class="block text-gray-700">Motivo:</label>
          <textarea name="motivo" id="motivo" rows="4" required class="w-full p-2 border border-gray-300 rounded">Bateria baja</textarea>
        </div>

        <div>
          <label for="imagen" class="block text-gray-700">Imagen:</label>
          <input type="file" name="imagen" id="imagen" class="w-full p-2 border border-gray-300 rounded">
        </div>
      
        <input type="hidden" name="contratoLimitado" value="contratoLimitado">

        <div class="flex justify-center">
          <input type="submit" value="Enviar" id="botonContratoLimitado" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        </div>
      </form>
    </div>
  </div>
  

  <footer class="bg-gray-900 py-8 mt-auto">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap justify-between">
        <div class="w-full text-white sm:w-1/3 lg:w-1/4 mb-6">
          <h2 class="text-lg font-bold mb-4">Your Company</h2>
          <p>making better world wenlan yitani</p>
          <div class="flex mt-4 space-x-4">
            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-github"></i></a>
            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-youtube"></i></a>
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="./assets/js/contrato/contratoLimitado.js"></script>
</body>

</html>
