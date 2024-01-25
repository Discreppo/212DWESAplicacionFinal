<?php
/* 
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 */

//Si el usuario pulsa el botón 'Salir', mando al usuario al index de DWES
if(isset($_REQUEST['salirDetalle'])){ 
    $_SESSION['paginaEnCurso'] = 'inicioPrivado'; // Asigno a la página en curso la pagina de inicioPrivado
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'detalle' 