<?php
/**
 * 
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cTecnologias' 
 * 
 */

// Si el usuario pulsa el botón 'Salir', mando al usuario a la página 'inicioPublico'
if(isset($_REQUEST['salirDeTecnologias'])){ 
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; // Asigno a la página en curso la página "anterior"
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'WIP'