<?php

/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de configuración
 * 
 */
require_once 'core/231018libreriaValidacion.php'; // Incluimos la librería de validación
// Incluimos los archivos de la parte del MODELO
require_once 'model/DB.php';
require_once 'model/DBPDO.php';
require_once 'model/ErrorApp.php';
require_once 'model/Usuario.php';
require_once 'model/UsuarioDB.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/REST.php';
require_once 'model/Parcela.php';
require_once 'model/ParcelaPDO.php';

// Constantes para la busqueda de Mto.Departamento
define("ESTADO_TODOS", 0);
define("ESTADO_ALTAS", 1);
define("ESTADO_BAJAS", 2);

// Creamos dos 'arrays' para indicar el 'path' de los archivos del controlador y la vista
$aController = [
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login' => 'controller/cLogin.php',
    'inicioPrivado' => 'controller/cInicioPrivado.php',
    'detalle' => 'controller/cDetalle.php',
    'rss' => 'controller/cRSS.php',
    'registro' => 'controller/cRegistro.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'wip' => 'controller/cWIP.php',
    'tecnologias' => 'controller/cTecnologias.php',
    'error' => 'controller/cError.php',
    'cambiarContraseña' => 'controller/cCambiarPassword.php',
    'apiREST' => 'controller/cREST.php',
    'consultarParcela' => 'controller/cMtoParcela.php',
    'editarParcela' => 'controller/cConsultarModificarParcela.php',
    'añadirParcela' => 'controller/cAltaParcela.php',
    'eliminarParcela' => 'controller/cEliminarParcela.php',
    'rehabilitacionParcela' => 'controller/cRehabilitacionParcela.php',
    'bajaParcela' => 'controller/cBajaLogicaParcela.php',
    'detalleParcela' => 'controller/cDetalleParcela.php'
];

// En el array de '$aView' almacenamos un array por idioma, para mostrar la vista en el idioma elegído por el usuario
$aView = [
    'SP' => [
        'layout' => 'view/SP/layout.php',
        'inicioPublico' => 'view/SP/vInicioPublico.php',
        'login' => 'view/SP/vLogin.php',
        'inicioPrivado' => 'view/SP/vInicioPrivado.php',
        'detalle' => 'view/SP/vDetalle.php',
        'rss' => 'view/SP/vRSS.php',
        'registro' => 'view/SP/vRegistro.php',
        'miCuenta' => 'view/SP/vMiCuenta.php',
        'borrarCuenta' => 'view/SP/vBorrarCuenta.php',
        'wip' => 'view/SP/vWIP.php',
        'tecnologias' => 'view/SP/vTecnologias.php',
        'error' => 'view/SP/vError.php',
        'cambiarContraseña' => 'view/SP/vCambiarPassword.php',
        'apiREST' => 'view/SP/vREST.php', 
        'consultarParcela' => 'view/SP/vMtoParcela.php',
        'editarParcela' => 'view/SP/vConsultarModificarParcela.php',
        'añadirParcela' => 'view/SP/vAltaParcela.php',
        'eliminarParcela' => 'view/SP/vEliminarParcela.php',
        'detalleParcela' => 'view/SP/vDetalleParcela.php'
    ],
    'UK' => [
        'layout' => 'view/UK/layout.php',
        'inicioPublico' => 'view/UK/vInicioPublico.php',
        'login' => 'view/UK/vLogin.php',
        'inicioPrivado' => 'view/UK/vInicioPrivado.php',
        'detalle' => 'view/UK/vDetalle.php',
        'rss' => 'view/UK/vRSS.php',
        'registro' => 'view/UK/vRegistro.php',
        'miCuenta' => 'view/UK/vMiCuenta.php',
        'borrarCuenta' => 'view/UK/vBorrarCuenta.php',
        'wip' => 'view/UK/vWIP.php',
        'tecnologias' => 'view/SP/vTecnologias.php',
        'error' => 'view/UK/vError.php',
        'cambiarContraseña' => 'view/UK/vCambiarPassword.php',
        'apiREST' => 'view/SP/vREST.php', 
        'consultarParcela' => 'view/SP/vMtoParcela.php',
        'editarParcela' => 'view/SP/vConsultarModificarParcela.php',
        'añadirParcela' => 'view/SP/vAltaParcela.php',
        'eliminarParcela' => 'view/SP/vEliminarParcela.php',
        'detalleParcela' => 'view/SP/vDetalleParcela.php'
    ]
];

$aTitleLang = [
    'SP' => [
        'inicioPublico' => 'Inicio Público',
        'login' => 'Inicio de Sesión',
        'inicioPrivado' => 'Inicio Privado',
        'detalle' => 'Detalle',
        'registro' => 'Registro',
        'miCuenta' => 'Mi Cuenta',
        'borrarCuenta' => 'Borrar Cuenta',
        'wip' => 'Zona En Construcción',
        'tecnologias' => 'Tecnologias',
        'error' => 'Error',
        'cambiarContraseña' => 'Cambiar Contraseña',
        'apiREST' => 'REST',
        'consultarParcela' => 'Mantenimiento Parcela',
        'detalleParcela' => 'Detalles de la parcela',
        'editarParcela' => 'Editar Parcela',
        'añadirParcela' => 'Añadir Parcela',
        'eliminarParcela' => 'Eliminar Parcela'
    ],
    'UK' => [
        'inicioPublico' => 'Public Home',
        'login' => 'Login',
        'inicioPrivado' => 'Private Home',
        'detalle' => 'Detail',
        'registro' => 'Registration',
        'miCuenta' => 'My Account',
        'borrarCuenta' => 'Delete Account',
        'wip' => 'Work in Progress',
        'tecnologias' => 'Tecnologies',
        'error' => 'Error',
        'cambiarContraseña' => 'Change Password',
        'apiREST' => 'REST',
        'consultarParcela' => 'Maintenance Parcela',
        'detalleParcela' => 'Parcela details',
        'editarParcela' => 'Edit Parcela',
        'añadirParcela' => 'Add Parcela',
        'eliminarParcela' => 'Delete Parcela'
    ]
];
