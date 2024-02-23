<?php
/* 
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 21/02/2024
 * @copyright Todos los derechos reservados a Carlos García
 */

/// Estructura del botón cancelar, si el usuario pulsa el botón 'cancelar'
if(isset($_REQUEST['cancelarEditar'])){ 
    $_SESSION['paginaAnterior'] = 'editarParcela'; // Almaceno la página anterior para poder volver
    $_SESSION['paginaEnCurso'] = 'consultarParcela'; // Asigno a la página en curso la pagina de consultarDepartamento
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

// Declaracion de la variable de confirmación de envio de formulario correcto
$entradaOK = true;

// Declaramos el array de errores y lo inicializamos vacío
$aErrores['DescripParcela'] = '';
$aErrores['Precio'] = '';

/*
 * Recuperamos el código del Parcela seleccionado anteriormente por medio de una variable de sesión
 * Y usando el metodo 'buscarParcelaPorCod' de la clase 'ParcelaPDO' recuperamos el objeto completo
 */
$oParcelaAEditar = ParcelaPDO::buscarParcelaPorCod($_SESSION['codParcelaActual']);

// Almaceno la información del Parcela actual en las siguiente variables, para mostrarlas en el formulario
if ($oParcelaAEditar) {
    $codParcelaAEditar = $oParcelaAEditar->getCodParcela();
    $descParcelaAEditar = $oParcelaAEditar->getDescParcela();
    $superficieAEditar = $oParcelaAEditar->getSuperficie();
    $fechaCompraAEditar = $oParcelaAEditar->getFechaCompra();
    $usoAEditar = $oParcelaAEditar->getUso();
    $precioAEditar = $oParcelaAEditar->getPrecio();    
}

if (isset($_REQUEST['confirmarCambiosEditar'])) { // Comprobamos que el usuario haya enviado el formulario para 'confirmar los cambios'
    $aErrores['descParcelaAEditar'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descParcelaAEditar'], 255, 3, 1);
    $aErrores['precioAEditar'] = validacionFormularios::comprobarFloatMejorado($_REQUEST['precioAEditar'], 9999999999, 0, 2, 2, 1);

// Recorremos el array de errores
    foreach ($aErrores as $campo => $error) {
        if ($error != null) { // Comprobamos que el campo no esté vacio
            $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario
            $_REQUEST[$campo] = ""; // Limpiamos los campos del formulario
        }
    }
} else {
    $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
}
if ($entradaOK) { // Si el usuario ha rellenado el formulario correctamente 
    // Usando el metodo 'modificarParcela' de la clase 'ParcelaPDO' para modificar el Parcela
    ParcelaPDO::modificarParcela($_SESSION['codParcelaActual'],$_REQUEST['DescripParcela'],$_REQUEST['Precio']);
    $_SESSION['paginaAnterior'] = 'editarParcela'; // Almaceno la página anterior para poder volver
    $_SESSION['paginaEnCurso'] = 'consultarParcela'; // Asigno a la página en curso la pagina de consultarDepartamento
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'consultarModificarDepartamento'