<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESOLVO</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <!-- <link rel="stylesheet" href="./assets/css/cssConocenos.css"> -->
  <!-- <link rel="stylesheet" href="./assets/css/cssVistaPrincipalHeader.css"> -->
  <link href="dist/output.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="./assets/css/cssVistaPrincipalFooter.css"> -->
  <style>
          *{
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
  <!-- <STYLE>
    
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      background-color: #dae8ff;
    }

    .QuienesSomos {
      width: 80%;
      display: flex;
      color: black;
      margin-left: 10%;
      text-align: justify;
      border-bottom: 1px solid black;
      animation: fadeIn 1.5s forwards;
    }

    #QuienesSomosP {
      color: black;
      margin-top: 3%;
      width: 70%;
      font-size: 15pt;
      text-align: justify;
    }

    #imgShisha1 {
      margin-left: 40%;
      width: 50%;
      margin-top: 10%;
      padding-bottom: 5%;
      transition: transform 0.3s;
    }

    #imgShisha1:hover {
      transform: scale(1.1);
    }

    h1 {
      margin-top: 5%;
      color: black;
      padding-bottom: 2%;
      transition: .5s;
    }

    h1:hover {
      color: rgb(31, 87, 241);
    }

    .historia {
      width: 80%;
      display: flex;
      color: black;
      margin-left: 10%;
      text-align: justify;
      margin-top: 2%;
      border-bottom: 1px solid black;
      animation: fadeIn 1.5s forwards;
    }

    #imgShisha2 {
      width: 75%;
      padding-bottom: 5%;
      transition: transform 0.3s;
      margin-top: 6%;
    }

    #imgShisha2:hover {
      transform: scale(1.1);
    }

    #historiaP {
      color: black;
      width: 70%;
      font-size: 15pt;
      margin-left: 5%;
      margin-bottom: 5%;
      text-align: justify;
    }

    .direccion {
      width: 80%;
      display: flex;
      color: black;
      margin-left: 10%;
      text-align: justify;
      margin-top: 2%;
      animation: fadeIn 1.5s forwards;
    }

    #direccionP {
      color: black;
      width: 70%;
      font-size: 15pt;
      margin-bottom: 5%;
      text-align: justify;
    }

    #imgShisha3 {
      margin-left: 40%;
      width: 55%;
      padding-bottom: 15%;
      transition: transform 0.3s;
      margin-top: 6%;
    }

    #imgShisha3:hover {
      transform: scale(1.1);
    }
  </STYLE> -->
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
  <section class="py-8 my-12 w-3/5 mx-auto">
    <div class="container mx-auto flex border-2 shadow-lg flex-col md:flex-row justify-between items-stretch space-y-8 md:space-y-0 md:space-x-8">
        <div class="w-full h-auto md:w-1/2 bg-gray-900 p-8 rounded-lg shadow-lg text-white flex flex-col justify-center items-center">
            <h2 class="text-4xl font-bold mb-4 text-center">¿Tienes algún Proyecto? Hablemos</h2>
            <p class="text-lg mb-4 text-center">Diseñado para Web y móvil</p>
            <p class="text-lg mb-4 text-center">Teléfono: <span class="text-yellow-500">+10 (67) 367-4568</span></p>
            <p class="text-lg mb-4 text-center">Deja tu mensaje: <span class="text-yellow-500">kevinsmith@gmail.com</span></p>
        </div>
        <div class="w-full md:w-1/2 bg-white p-8 flex-grow">
            <form action="#" method="POST" >
                <div class="mb-2">
                    <label for="name" class="block text-gray-700 font-medium">Enter your Name</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Enter your Name" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="block text-gray-700 font-medium">Enter a valid email address</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Enter a valid email address" required>
                </div>
                <div class="mb-2">
                    <label for="message" class="block text-gray-700 font-medium">Enter your message</label>
                    <textarea id="message" name="message" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Enter your message" rows="5" required></textarea>
                </div>
                <button type="submit" class="w-full py-3 bg-yellow-500 text-white font-bold rounded hover:bg-yellow-600 transition duration-300">ENVIAR</button>
            </form>
        </div>
    </div>
</section>



<footer class="bg-gray-900 py-8 absolute bottom-0 w-full" style="padding: 0%">
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
</body>

</html>