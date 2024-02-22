<?php

/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 14/02/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Aplicación Final - Parte de 'cMtoParcela' 
 * 
 */
// Estructura del botón salir, si el usuario pulsa el botón 'salir'
if (isset($_REQUEST['salirParcela'])) {
    $_SESSION['paginaAnterior'] = 'consultarParcela'; // Almaceno la página anterior para poder volver
    $_SESSION['paginaEnCurso'] = 'inicioPrivado'; // Asigno a la página en curso la pagina de inicioPrivado
    $_SESSION['criterioBusquedaParcela']['descripcionBuscada'] = '';
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

// Estructura del botón editarDepartamento, si el usuario pulsa el botón del icono de un 'lapiz'
if (isset($_REQUEST['cConsultarModificarParcela'])) {
    $_SESSION['codParcelaActual'] = $_REQUEST['cConsultarModificarParcela']; // Almaceno en una variable de sesión el Codigo del Parcela Seleccionada
    $_SESSION['paginaAnterior'] = 'consultarParcela'; // Almaceno la página anterior para poder volver
    $_SESSION['paginaEnCurso'] = 'editarParcela'; // Asigno a la página en curso la pagina de ConsultarModificarParcela
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

// Estructura del boton detalle Parcela, si el usuario pulsa el boton
if (isset($_REQUEST['cDetalleParcela'])) {
    $_SESSION['codParcelaActual'] = $_REQUEST['cDetalleParcela']; // Almaceno en una variable de sesión el Codigo del Parcela Seleccionado
    $_SESSION['paginaAnterior'] = 'consultarParcela'; // Almaceno la página anterior para poder volver
    $_SESSION['paginaEnCurso'] = 'detalleParcela'; // Asigno a la página en curso la pagina de detalleParcela
    header('Location: index.php'); // Redirecciono al index de la APP
    exit;
}

if (!isset($_SESSION['criterioBusquedaParcela']['descripcionBuscada'])) {
    $_SESSION['criterioBusquedaParcela']['descripcionBuscada'] = '';
}

//Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
//Valores por defecto
$entradaOK = true; //Indica si todas las respuestas son correctas
$aErrores ['DescParcela'] = ''; // Almacena los errores

//Comprobamos si se ha enviado el formulario
if (isset($_REQUEST['buscarParcelaPorDesc'])) {
    //Introducimos valores en el array $aErrores si ocurre un error
    $aErrores['DescParcela'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescParcela'], 255, 1, 0);

    //Recorremos el array de errores
    foreach ($aErrores as $sCampo => $sError) {
        if ($sError != null) { // Si hay errores
            $_REQUEST[$sCampo] = ''; // Limpio el campo del formulario
            $entradaOK = false; // Y cambio el valor de entrada a False
        }
    }
} else {
    $entradaOK = false; //Si no ha pulsado el botón de enviar, la validación es incorrecta.  
}

//Si la entrada es Ok, almacenamos el valor de la respuesta del usuario en el array $aRespuestas
if ($entradaOK) {
    // Almacenamos el valor en el array en la variable de sesión e inicializamos el número de páginas a 1
    $_SESSION['criterioBusquedaParcela']['descripcionBuscada'] = $_REQUEST['DescParcela'];
}


/*
 * Por medio del método 'buscaParcelasPorDescPaginados' de la clase 'ParcelaPDO' busco todas las Parcelas
 * con los siguientes parámetros. 
 * La descripción y el número de paginación también.
 * 
 * Le resto 1 a la variable de '$_SESSION['numPaginacionParcelas']' para indicar el índice 0 de la paginación y que así nos muestre los 5 primeros resultados,
 * si no lo hiciera, nos mostraría a partir de los 5 siguientes, porque es lo que le indico en el método.
 */

$aMtoParcelas = ParcelaPDO::buscaParcelasPorDesc($_SESSION['criterioBusquedaParcela']['descripcionBuscada']);
$aVMtoParcelas = []; // Array para guardar el contenido de las parcelas
// Ejecutando la declaración SQL
if ($aMtoParcelas) {
    foreach ($aMtoParcelas as $aParcela) {//Recorro el objeto del resultado que contiene un array
        $aVMtoParcelas[] = [
            'codParcela' => $aParcela->getCodParcela(),
            'descParcela' => $aParcela->getDescParcela(),
            'superficieParcela' => $aParcela->getSuperficie(),
            'fechaCompraParcela' => $aParcela->getFechaCompra(),
            'usoParcela' => $aParcela->getUso(),
            'precioParcela' => $aParcela->getPrecio(),
            'fechaBajaParcela' => !is_null($aParcela->getFechaBaja()) ? $aParcela->getFechaBaja() : ''
        ];
    }
} else {
    if ($_COOKIE['idioma'] == 'SP') {
        $aErrores['DescParcela'] = "No existen parcelas con esa descripción";
    } else {
        $aErrores['DescParcela'] = "There are no parcels with that description";
    }
}

require_once $aView[$_COOKIE['idioma']]['layout']; // Cargo la vista de 'MtoDepartamento'