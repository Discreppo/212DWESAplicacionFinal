<?php

/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Aplicación Final - Parte de 'cREST' 
 * 
 */
//Si el usuario pulsa el botón 'salir'...
if (isset($_REQUEST['salirREST'])) {
    $_SESSION['paginaAnterior'] = 'apiREST'; // Almaceno la página anterior para poder volver
    $_SESSION['paginaEnCurso'] = 'inicioPrivado'; // Asigno a la página en curso la pagina de inicioPrivado
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

// Declaramos variables y array de errores y los inicializamos vacíos
$explicacion = null;
$imagen = null;
$title = null;
$aNombre = [];
$aDireccion = [];
$aReseñas = [];
$aPuntuacion = [];
$mensaje = "";
if (!isset($_SESSION['fecha'])) {
    $_SESSION['fecha'] = date("Y-m-d");
}

if (isset($_REQUEST['nasa'])) {
    $Nasa = REST::apiNasa($_REQUEST['fecha']);
    $_SESSION['fecha'] = $_REQUEST['fecha'];
    $explicacion = $Nasa['explanation'];
    $imagen = $Nasa['url'];
    $title = $Nasa['title'];
} else {
    $Nasa = REST::nasa();
    $explicacion = $Nasa['explanation'];
    $imagen = $Nasa['url'];
    $title = $Nasa['title'];
}

if (isset($_REQUEST['negocio'])) {
    if(!empty($_REQUEST['busqueda'])){
    $negocio = REST::negocio($_REQUEST['busqueda']);
    if(isset($negocio['message'])){
        $mensaje = $negocio['message'];
    }else{
        for ($index = 0; $index < count($negocio['data']); $index++) {
            if(!is_null($negocio['data'][$index]['name'])){
            $aNombre[$index] = $negocio['data'][$index]['name'];
            }
            $aDireccion[$index] = $negocio['data'][$index]['address'];
            $aReseñas[$index] = $negocio['data'][$index]['reviews_link'];
            $aPuntuacion[$index] = $negocio['data'][$index]['rating'];
        }
    }
    }
}


$_SESSION['paginaAnterior'] = 'inicioPrivado'; // Almaceno la página anterior para poder volver
$_SESSION['paginaEnCurso'] = 'apiREST'; // Asigno a la página en curso la pagina de apiREST
//header('Location: index.php'); // Redirecciono al index de la APP
//exit;

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'REST'oma']]['layout']; // Cargo la vista de 'WIP'