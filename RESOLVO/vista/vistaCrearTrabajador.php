<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESOLVO</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
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

        a {
            color: white;
        }
    </style>
    </style>
    <!-- <style>
.otro {
    border: 2px solid red;
}
a{
    color: white;
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
</style> -->
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

    <main>
        <section class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg" style="margin: 7% auto">
            <h1 class="text-2xl font-bold mb-6 text-center">Crear Trabajador</h1>
            <form method="post" id="formularioCrearTrabajador" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label for="nombre" class="block text-gray-700">Nombre:</label><input type="text" id="nombre"
                            name="nombre" required value="Desmond"
                            class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                    <div><label for="apellido" class="block text-gray-700">Apellidos:</label><input type="text"
                            id="apellido" name="apellido" required value="Miller"
                            class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                </div>
                <div><label for="calle" class="block text-gray-700">Calle:</label><input type="text" id="calle"
                        name="calle" value="Italia 19" class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label for="codPostal" class="block text-gray-700">Código Postal:</label><input type="text"
                            id="codPostal" name="codPostal" value="28925"
                            class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                    <div><label for="ciudad" class="block text-gray-700">Ciudad:</label><input type="text" id="ciudad"
                            name="ciudad" value="Leganes" class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label for="provincia" class="block text-gray-700">Provincia:</label><input type="text"
                            id="provincia" name="provincia" value="Cuenca"
                            class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                    <div><label for="telefono" class="block text-gray-700">Teléfono:</label><input type="text"
                            id="telefono" name="telefono" value="147852369"
                            class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label for="dni" class="block text-gray-700">DNI:</label><input type="text" id="dni" name="dni"
                            value="12345678L" class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                    <div><label for="fechaNacimiento" class="block text-gray-700">Fecha de Nacimiento:</label><input
                            type="date" id="fechaNacimiento" name="fechaNacimiento"
                            class="w-full p-2 border border-gray-300 rounded mt-1"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label for="cargo" class="block text-gray-700">Cargo:</label><select id="cargo" name="cargo"
                            required class="w-full p-2 border border-gray-300 rounded mt-1">
                            <option value="administrador">Administrador</option>
                            <option value="tecnico">Técnico</option>
                        </select></div>
                    <div><label for="especializacion" class="block text-gray-700">Especialización:</label><select
                            id="especializacion" name="especializacion"
                            requiredclass="w-full p-2 border border-gray-300 rounded mt-1">
                            <option value="movil">Móvil</option>
                            <option value="pc">PC</option>
                            <option value="portailes">Portátiles</option>
                            <option value="electrodomesticos">Electrodomésticos</option>
                            <option value="otro">Otro</option>
                        </select></div>
                </div>
                <div class="text-center mt-6"><input type="submit" value="Crear Trabajador" id="botonEnviar"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"></div>
            </form>
        </section>
    </main>

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
    <script type="text/javascript" src="./assets/js/administrador/crearTrabajador.js"></script>
</body>

</html>