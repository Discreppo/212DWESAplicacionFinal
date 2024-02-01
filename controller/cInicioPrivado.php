<?php
/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 */ 

//Si el usuario pulsa el botón 'Cerrar Sesion', mando al usuario al index de DWES
if(isset($_REQUEST['cerrarSesion'])){
    session_destroy(); // Elimino la sesión
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

//Si el usuario pulsa el botón 'Detalle', mando al usuario al index de DWES
if(isset($_REQUEST['detalle'])){
    $_SESSION['paginaEnCurso'] = 'detalle'; // Asigno a la página en curso la pagina de tecnologias
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

//Si el usuario pulsa el botón 'Editar Perfil', mando al usuario al index de DWES
if(isset($_REQUEST['editarPerfil'])){
    $_SESSION['paginaEnCurso'] = 'miCuenta'; // Asigno a la página en curso la pagina de WIP (Work in Progress)
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

//Si el usuario pulsa el botón 'Detalle', mando al usuario al index de DWES
if(isset($_REQUEST['mtoDepartamentos'])){
    $_SESSION['paginaAnterior'] = 'inicioPrivado'; // Guardo la página actual como anterior para poder volvera ella
    $_SESSION['paginaEnCurso'] = 'wip'; // Asigno a la página en curso la pagina de WIP (Work in Progress)
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

//Si el usuario pulsa el botón 'Detalle', mando al usuario al index de DWES
if(isset($_REQUEST['apiREST'])){
    $_SESSION['paginaEnCurso'] = 'apiREST'; // Asigno a la página en curso la pagina de apiREST
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

$descripcionUsuario = $_SESSION['user212DWESLoginLogoutMulticapaPOO']->get_descUsuario(); // Recupero y almaceno la descripción del usuario actual
$numeroConexionesUsuario = $_SESSION['user212DWESLoginLogoutMulticapaPOO']->get_numAcceso(); // Recupero y almaceno el número de conexiones del usuario actual
$fechaHoraUltimaConexionAnterior = $_SESSION['user212DWESLoginLogoutMulticapaPOO']->get_fechaHoraUltimaConexionAnterior(); // Recupero y almaceno la fecha y hora de conexión anterior del usuario actual

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'inicioPrivado'