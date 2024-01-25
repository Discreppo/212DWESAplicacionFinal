<?php
/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 */ 

if ($_SERVER['SERVER_NAME'] == 'daw212.isauces.local') {
    define('DSN', 'mysql:host=192.168.20.19;dbname=DB212DWESLoginLogoffTema5'); // Host 'IP' y nombre de la base de datos
    define('USERNAME','user212DWESLoginLogoffTema5'); // Nombre de usuario de la base de datos
    define('PASSWORD','paso'); // Contraseña de la base de datos
    // Archivo de configuración de la BD de Explotación
    } elseif ($_SERVER['SERVER_NAME'] == 'daw212.ieslossauces.es') {
        define('DSN', 'mysql:host=db5014806792.hosting-data.io;dbname=dbs12302449'); // Host y nombre de la base de datos
        define('USERNAME','dbu2959127'); // Nombre de usuario de la base de datos
        define('PASSWORD','daw2_Sauces'); // Contraseña de la base de datos
    }
