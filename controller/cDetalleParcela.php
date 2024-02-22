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
    $_SESSION['paginaEnCurso'] = 'consultarParcela'; // Asigno a la página en curso la pagina de inicioPrivado
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

/*
 * Recuperamos el código de la Parcela seleccionada anteriormente por medio de una variable de sesión
 * Y usando el metodo 'buscarParcelaPorCod' de la clase 'ParcelaPDO' recuperamos el objeto completo
 */
$oParcelaAMostrar = ParcelaPDO::buscarParcelaPorCod($_SESSION['codParcelaActual']);

// Almaceno la información del Parcela actual en las siguiente variables, para mostrarlas en el formulario
if ($oParcelaAMostrar) {
    $codParcelaAMostrar = $oParcelaAMostrar->getCodParcela();
    $descParcelaAMostrar = $oParcelaAMostrar->getDescParcela();
    $superficieAMostrar = $oParcelaAMostrar->getSuperficie();
    $fechaCompraAMostrar = $oParcelaAMostrar->getFechaCompra();
    $usoAMostrar = $oParcelaAMostrar->getUso();
    $precioAMostrar = $oParcelaAMostrar->getPrecio();
    $fechaBajaAMostrar = $oParcelaAMostrar->getFechaBaja();
}

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'detalle' 