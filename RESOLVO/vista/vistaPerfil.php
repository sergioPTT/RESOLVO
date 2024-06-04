<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESOLVO</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <!-- <link rel="stylesheet" href="./assets/css/cssPerfil.css"> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <link href="dist/output.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      background-color: #dae8ff;
    }

    a {
      color: white
    }
    
  </style>
</head>

<body>
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
            echo "<a href='#'>VER INCIDENCIAS</a>";
            echo "<a href='index.php?vistaVerClientes'>VER CLIENTES</a>";
          } else if ($_SESSION["cargoTrabajador"] == "administrador") {
            echo "<a href='index.php?vistaVerIncidencias'>VER INCIDENCIAS</a>";
            echo "<a href='index.php?vistaVerClientes'>VER CLIENTES</a>";
            echo "<a href='index.php?vistaVerTrabajador'>VER TRABAJADORES</a>";
            echo "<a href='index.php?vistaCrearTrabajador'>CREAR TRABAJADORES</a>";
          }
        } else {
          echo '<a href="index.php?vistaPrincipal">PRINCIPAL</a>';
          echo '<a href="index.php?vistaConocenos">CONOCENOS</a>';
          echo '<a href="index.php?vistaQueHacemos">QUE HACEMOS</a>';
          echo '<a href="index.php?vistaContrato">CONTRATO</a>';
          echo '<a href="index.php?vistaContacto">CONTACTO</a>';
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


  <!-- //Puedo hacer que si tiene contrato le muestre los datos del cliente si no los del trabajador -->
  
    
    <div class="p-6 rounded-lg">
      <?php
      if (isset($_SESSION["acceso"])) {
        ?>
        <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg" style="margin-top: 6%">
      <h1 class="text-2xl font-bold mb-6 text-center">ESTO ES LA PAGINA DE DONDE EL CLIENTE/TRABAJADOR PODRA VER SUS
        DATOS</h1>
      <P class="text-center mb-4">Aqui estan tus datos:</P>
      <button id="botonDarseDeBaja">DARSE DE BAJA</button>
     
    </div>
        <?php
        echo '<form id="formularioPerfil" method="post">';
        echo '<input type="hidden" name="emailCliente" value="' . $_SESSION["emailCliente"] . '">';
        // echo '<input type="submit" class="input-submit" value="DARSE DE BAJA" id="botonDarseDeBaja">';
        echo '</form>';
      } else {

        echo '<form id="formularioPerfilTrabajador" method="post">';
        echo '<input type="hidden" name="emailTrabajador" value="' . $_SESSION["emailTrabajador"] . '">';
        echo '</form>';
      }

      ?>
    </div>
  
    
  <div id="unico">
  <button id="editButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
      <button id="saveButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded hidden">Guardar</button>
  </div>




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
  <script type="text/javascript" src="./assets/js/perfil/darseDeBaja.js"></script>
  <script type="text/javascript" src="./assets/js/perfil/perfil.js"></script>
</body>

</html>