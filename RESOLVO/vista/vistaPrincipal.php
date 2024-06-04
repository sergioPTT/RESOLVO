<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESOLVO</title>
  <!-- <link rel="stylesheet" href="./assets/css/cssVistaPrincipalBody.css">  -->
  <link rel="stylesheet" href="./assets/css/normalize.css">
  <link href="dist/output.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
  <!-- <link rel="stylesheet" href="./assets/css/cssVistaPrincipal.css"> -->
  <!-- <link rel="stylesheet" href="./assets/css/cssVistaPrincipalHeader.css">
  <link rel="stylesheet" href="./assets/css/cssVistaPrincipalFooter.css"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet"> -->

  <style>
    * {
      font-family: "Poetsen One", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    .cssBanner {
      width: 100%;
      height: 550px;
      display: block;
      padding-bottom: 2%;
    }

    body {
      background-color: #dae8ff;
    }

    /* *,
    *:before,
    *:after {
      box-sizing: inherit;

    } */


    h1 {
      text-align: center;
      font-size: 5rem;

    }

    /* h2 {
      //no descomentar este h2 DANGER
      text-align: center;
      font-size: 4rem;
    } */

    .textoPrincipal {
      width: 100%;
      max-width: 214rem;
      margin: 0 auto;
      font-size: 2rem;
    }

    .contenedor-lista {
      display: flex;
      justify-content: space-around;
      width: 100%;
      max-width: 120rem;
      height: 20rem;
      margin: 0 auto;
    }

    .lista-div {
      width: 20rem;
      text-align: center;
      margin-top: 1rem;
    }

    .lista-div img:hover {
      scale: 1.1;
    }

    h3 {
      font-size: 2rem;
      margin: 0;
    }

    .trioImagenes {
      display: flex;
      flex-direction: row;
    }


    .trioImagenes img {
      width: 68%;
      text-align: center;
      height: 89%;
    }

    .imagen1 {
      width: 33%;
      text-align: center;
    }

    .imagen2 {
      width: 33%;
      text-align: center;
    }

    .imagen3 {
      width: 33%;
      text-align: center;
    }
    nav a{
      color: white;
    }

    */
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


  <div class="banner">
    <img src="./assets/img/banner2.png" class="cssBanner">
  </div>
  <div class="titulo-div">
    <h1>QUE HACEMOS</h1>
  </div>
  <div>
    <h2>un resumen de nuestro catálogo de servicios</h2>
  </div>

  <div>
    <p class="textoPrincipal">La captación y gestión del talento humano con la finalidad de incorporarlos al mercado
      es el foco principal de
      nuestro servicio que además incluyen proyectos de consultoría e integración tecnológica.Todos nuestros
      indicadores de control y desempeño han mejorado de forma notable como muestra de nuestro compromiso en
      convertirnos en una marca reconocida y líder en la industria de consultoría y selección.</p>
  </div>
  <div class="contenedor-lista">
    <div class="lista-div">
      <img src="./assets/img/queTeDen.png" alt="">
      <h3>Consultoria</h3>
      <p class="textoSecundario">Para nosotros, la Integración se define como el conjunto de elementos relacionados o
        que interactúan, que permiten implantar y alcanzar la política y los objetivos de una organización, en lo que
        se refiere a aspectos diversos como pueden ser los de calidad,</p>
    </div>
    <div class="lista-div">
      <img src="./assets/img/pieza.png" alt="">
      <h3>Integracion</h3>
      <p class="textoSecundario">Para nosotros, la Integración se define como el conjunto de elementos relacionados o
        que interactúan, que permiten implantar y alcanzar la política y los objetivos de una organización, en lo que
        se refiere a aspectos diversos como pueden ser los de calidad,</p>
    </div>
    <div class="lista-div">
      <img src="./assets/img/cohete.png" alt="">
      <h3>Desarollo</h3>
      <p class="textoSecundario">Para nosotros, la Integración se define como el conjunto de elementos relacionados o
        que interactúan, que permiten implantar y alcanzar la política y los objetivos de una organización, en lo que
        se refiere a aspectos diversos como pueden ser los de calidad,</p>
    </div>
    <div class="lista-div">
      <img src="./assets/img/externo.png" alt="">
      <h3>Externalizacion</h3>
      <p class="textoSecundario">Para nosotros, la Integración se define como el conjunto de elementos relacionados o
        que interactúan, que permiten implantar y alcanzar la política y los objetivos de una organización, en lo que
        se refiere a aspectos diversos como pueden ser los de calidad,</p>
    </div>
  </div>
  <!-- <div class="trioImagenes">
    <div class="imagen1">
      <img src="./assets/img/imagen1.jpg" alt="">
    </div>
    <div class="imagen2">
      <img src="./assets/img/imagen2.png" alt="">
    </div>
    <div class="imagen3">
      <img src="./assets/img/imagen3.png" alt="">
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
</body>

</html>