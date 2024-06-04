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

        a {
            color: white;
        }
        
        th {
            padding: 1%
        }

        td {
            text-align: center;
            background-color: white;
            padding: 1%;
        }

        h1 {
            text-align: center;

        }
        table{
            margin: 6% auto;
            width: 83%;
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
                        echo "<a href='index.php?vistaPrincipal'>VER INCIDENCIAS</a>";
                        echo "<a href='index.php?vistaPrincipal'>VER CLIENTES</a>";
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

    <div style="margin-top: 6%">
        <h1>ESTO ES LA PAGINA QUE TIENE EL ADMINISTRADORES PARA VER LOS TRABAJADORES </h1>
    </div>



    <div class="container mx-auto mt-4">

        <div id="filtroContainer" class="flex space-x-4" style="align-items: baseline; justify-content: center;">
            <label for="filtrarTrabajadorTexto" class="block text-lg font-bold mb-2">Filtrar por:</label>

            <!-- Filtrar por codigo postal -->
            <form id="filtrarCodPostal" class="flex items-center space-x-2 mb-4">
                <input type="text" name="codPostal" id="filtrarcodPostalTexto" placeholder="Filtra por Codigo postal"
                    class="border rounded px-2 py-1" value="28000">
                <input type="submit" value="Filtrar" id="botonFiltrarCodPostal"
                    class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            </form>

            <!-- Filtrar por FiltrarCargo -->
            <form id="filtrarCargo" class="flex items-center space-x-2 mb-4">
                <input type="text" name="cargo" id="filtrarCargoTexto" placeholder="Filtra por Cargo"
                    class="border rounded px-2 py-1" value="tecnico">
                <input type="submit" value="Filtrar" id="botonFiltrarCargo"
                    class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            </form>

            <!-- Filtrar por especializacion -->
            <form id="filtrarEspecializacion" class="flex items-center space-x-2 mb-4">
                <input type="text" name="especializacion" id="filtrarEspecializacionTexto"
                    placeholder="Filtra por especializacion" class="border rounded px-2 py-1" value="movil">
                <input type="submit" value="Filtrar" id="botonFiltrarEspecializacion"
                    class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            </form>

            <input type="submit" value="Mostrar trabajadores" id="mostrarTrabajador"
                class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer" style="height: 40px">
        </div>
    </div>





    <div id="unico">

    </div>


    <!-- -------------------------- -ESTE ES EL INICIO DE FOOTER- ------------------------------------- -->


    <footer class="bg-gray-900 py-8 mt-auto">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-full text-white sm:w-1/3 lg:w-1/4 mb-6">
                    <h2 class="text-lg font-bold mb-4">Your Company</h2>
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
    <script type="text/javascript" src="./assets/js/administrador/trabajador.js"></script>
</body>

</html>