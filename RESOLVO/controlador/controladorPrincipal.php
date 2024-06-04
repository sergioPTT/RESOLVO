<?php
if (isset($_GET['vistaConocenos'])) {
       require("./vista/vistaConocenos.php");
} elseif (isset($_GET['vistaRegistrarse'])) {
       require("./vista/vistaRegistrarse.php");
} elseif (isset($_GET['vistaPerfil'])) {
       require("./vista/vistaPerfil.php");
} elseif (isset($_GET['vistaContacto'])) {
       require("./vista/vistaContacto.php");
} elseif (isset($_GET['vistaQueHacemos'])) {
       require("./vista/vistaQueHacemos.php");
} elseif (isset($_GET['vistaContrato'])) {
       require("./vista/vistaContrato.php");
} elseif (isset($_GET['vistaIniciarSesion'])) {
       require("./vista/vistaIniciarSesion.php");
}  elseif (isset($_GET['vistaTecnico'])) {
       require("./vista/vistaTecnico.php");
} elseif (isset($_GET['vistaContratoLimitado'])) {
       require("./vista/vistaContratoLimitado.php");
} elseif (isset($_GET['vistaLogout'])) {
       require("./vista/vistaLogout.php");
} elseif (isset($_GET['vistaOlvidarPassword'])) {
       require("./vista/vistaOlvidarPassword.php");
} elseif (isset($_GET['vistaPago'])) {
       require("./vista/vistaPago.php");
} elseif (isset($_GET['vistaCambiarPassword'])) {
       require("./vista/vistaCambiarPassword.php");
} elseif (isset($_GET['vistaVerIncidencias'])) {
       require("./vista/vistaVerIncidencias.php");
} elseif (isset($_GET['vistaVerClientes'])) {
       require("./vista/vistaVerClientes.php");
} elseif (isset($_GET['vistaVerTrabajador'])) {
       require("./vista/vistaVerTrabajador.php");
} elseif (isset($_GET['vistaCrearTrabajador'])) {
       require("./vista/vistaCrearTrabajador.php");
} elseif (isset($_GET['vistaPagoIlimitado'])) {
       require("./vista/vistaPagoIlimitado.php");
} elseif (isset($_GET['vistaSinContrato'])) {
       require("./vista/vistaSinContrato.php");
} elseif (isset($_GET['vistaFormularioSinContrato'])) {
       require("./vista/vistaFormularioSinContrato.php");
} else {
       require("./vista/vistaPrincipal.php");
}
