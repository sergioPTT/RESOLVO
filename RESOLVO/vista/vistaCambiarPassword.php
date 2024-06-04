<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESOLVO</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./assets/css/cssCambiarPassword.css">
    <style>
        .tituloRegister {
            font-size: 85pt;
            font-family: revert-layer;
            color: #1f57f1;
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

        .desaparecer {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <img src="./assets/img/resolvo.png" class="imagenLogo">
            <p class="logo">RESOLVO!</p>
        </div>
        <div class="container2">
            <nav>
                <?php
                session_start();
                if (isset($_SESSION["cargoTrabajador"])) {
                    if ($_SESSION["cargoTrabajador"] == "tecnico") {
                        echo "<a href='index.php?vistaPrincipal'>VER INCIDENCIAS</a>";
                        echo "<a href='index.php?vistaPrincipal'>VER CLIENTES</a>";
                    } else if ($_SESSION["cargoTrabajador"] == "administrador") {
                        echo "<a href='index.php?vistaVerIncidencias'>VER INCIDENCIAS</a>";
                        echo "<a href='index.php?vistaVerClientes'>VER CLIENTES</a>";
                        echo "<a href='index.php?vistaVerTecnicos'>VER TECNICOS</a>";
                        echo "<a href='index.php?vistaVerTrabajadores'>CREAR TRABAJADORES</a>";
                    }
                } else {
                    echo '<a href="index.php?vistaPrincipal">PRINCIPAL</a>';
                    echo '<a href="index.php?vistaConocenos">CONOCENOS</a>';
                    echo '<a href="index.php?vistaQueHacemos">QUE HACEMOS</a>';
                    echo '<a href="index.php?vistaContrato">CONTRATO</a>';
                    echo '<a href="index.php?vistaContacto">CONTACTO</a>';
                }
                ?>


            </nav>
        </div>

        <div class="container3">
            <nav>

                <!-- <a href="index.php?vistaIniciarSesion">INICIAR SESION</a>
<a href="index.php?vistaRegistrarse">REGISTRARSE</a> -->
                <?php

                if (isset($_SESSION["acceso"])) {
                    echo '<a href="index.php?vistaPerfil"><i class="far fa-user"></i></a>';
                    echo "<a href='index.php?vistaLogout'>CERRAR SESION CLIENTE</a>";
                } else if (isset($_SESSION["accesoTrabajador"])) {
                    echo '<a href="index.php?vistaPerfil"><i class="far fa-user"></i></a>';
                    echo "<a href='index.php?vistaLogout'>CERRAR SESION TRABAJADOR</a>";
                } else {
                    echo "<a href='index.php?vistaIniciarSesion'>INICIAR SESION</a>";
                    echo "<a href='index.php?vistaRegistrarse'>REGISTRARSE</a>";
                }
                ?>
            </nav>
        </div>
    </header>
    <h1>ESTE ES LA PAGINA DONDE EL TRABAJADOR NUEVO TENDRA QUE CAMBIAR LA CONTRASEÑA</h1>
    <H1>SI ES LA PRIMERA VEZ QUE INICIO SESION</H1>
    <center>
        <form id="formularioCambiarPassword">
            <div class="login_box">

                <div>

                    <div class="input_box" id="divEmail">
                        Escribe tu correo
                        <form>
                            <label for="to">Para:</label>
                            <input type="email" id="to" name="to" required><br><br>

                            <!-- <label for="subject">Asunto:</label> -->
                            <input type="hidden" id="subject" name="subject"  value="codigo de verificacion" required><br><br>
                            <?php
                            $numeroAleatorio = rand(1, 10);
                        
                            ?>
                            <label for="message">Mensaje:</label><br>
                            <input type="hidden" id="message" name="message" value="<?php echo $numeroAleatorio; ?>" required>
                            <input type="submit" value="Enviar" id="botonPruebaEmail">

                        </form>

                    </div>
                </div>

                <div class="desaparecer" id="divCodigo">
                    Escribe el codigo que te ha llegado al correo
                    <input type="text" id="codigo" class="input-field" placeholder="codigo here" name="codigo">
                    <i class="bx bx-lock-alt icon"></i>
                    <div id="codigo-error" class="error-message"></div>
                    <input type="hidden"  id="codigoRandom" value="<?php echo $numeroAleatorio; ?>">
                    <div class="input_box">
                        <input type="submit" class="input-submit" value="mandar codigo" id="botonEnviarCodigo">
                    </div>
                </div>

                <div class="desaparecer" id="divPasswords">
                    Escribe una contraseña nueva
                    <div class="input_box">
                        <input type="text" id="password" class="input-field" placeholder="contraseña" name="password"
                            value="2">
                        <i class="bx bx-lock-alt icon"></i>
                        <div id="pass-error" class="error-message"></div>
                    </div>

                    Escribe de nuevo la contraseña nueva
                    <div class="input_box">
                        <input type="text" id="password2" class="input-field" placeholder=" Repetir contraseña"
                            name="password2" value="2">
                        <i class="bx bx-lock-alt icon"></i>
                        <div id="pass2-error" class="error-message"></div>
                    </div>
                    
                    <input type="hidden" name="cambiarPassword" value="cambiarPassword">

                    <div class="input_box">
                        <input type="submit" class="input-submit" value="cambiar Contraseña" id="botonEnviar">
                    </div>
                </div>

            </div>
        </form>
        <footer>
            <div class="content">
                <div class="top">
                    <div class="logo-details">
                        <i class="fa-solid fa-share-nodes"></i>
                        <!-- <img src="resolvo.png" class="imagenLogo"> -->
                        <span class="logo_name">Resolvo</span>
                        <!-- <img src="resolvo.png" class="imagenLogo"> -->
                    </div>
                    <div class="media-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="link-boxes">
                    <div class="listaFooter">
                        <ul class="box">
                            <li class="link_name">COMUNIDAD</li>
                            <hr class="lineaFooter">
                            <li><a href="#">Compromiso</a></li>
                            <li><a href="#">Respeto</a></li>
                            <li><a href="#">Afiliados</a></li>
                            <!-- <li><a href="#">Get started</a></li> -->
                        </ul>
                    </div>

                    <div class="listaFooter">
                        <ul class="box">
                            <li class="link_name">TRANSPORTE</li>
                            <hr class="lineaFooter">
                            <li><a href="#">METRO</a></li>
                            <li><a href="#">BUS</a></li>
                            <li><a href="#">RENFE</a></li>
                            <!-- <li><a href="#">design</a></li> -->
                        </ul>
                    </div>
                    <div class="listaFooter">
                        <ul class="box">
                            <li class="link_name">LEGALIDAD</li>
                            <hr class="lineaFooter">
                            <li><a href="#">AVISOS</a></li>
                            <li><a href="#">CONTROL</a></li>
                            <li><a href="#">SEGURIDAD</a></li>
                            <!-- <li><a href="#">Purchase</a></li> -->
                        </ul>
                    </div>
                    <div class="listaFooter">
                        <ul class="box">
                            <li class="link_name">OTROS</li>
                            <hr class="lineaFooter">
                            <li><a href="#">Publicidad</a></li>
                            <li><a href="#">Opiniones</a></li>
                            <li><a href="#">Canal etico</a></li>
                            <!-- <li><a href="#">Photoshop</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="./assets/js/cambiarPassword/cambiarPassword.js" type="text/javascript"></script>
        <!-- <script src="./assets/js/cambiarPassword/pruebaEmail.js" type="text/javascript"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>