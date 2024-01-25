<?php
/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 */ 

 if (!isset($_COOKIE['idioma'])) { // Comprobamos si la cookie esta declarada
   setcookie("idioma", "SP", time() + 2592000); // En caso negativo la creamos y ponemos el valor por defecto
   header('Location: index.php'); // Redirecciono al index de la APP
   exit();
}

if (isset($_REQUEST['botonIdioma'])) { // Comprobamos si el usuario a pulsado algún botón de idioma
    setcookie("idioma", $_REQUEST['botonIdioma'], time() + 2592000); // En caso afirmativo creamos la cookie y la cargamos con el valor seleccionado y ponemos una fecha de caducidad de 1 mes
    header('Location: index.php'); // Redirecciono al index de la APP
    exit();
}

// Si el usuario pulsa el botón 'Iniciar Sesión', mando al usuario a la página del login
if(isset($_REQUEST['login'])){ 
    $_SESSION['paginaEnCurso'] = 'login'; // Asigno a la pagina en curso la pagina de login
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}
 
require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'inicioPublico' 