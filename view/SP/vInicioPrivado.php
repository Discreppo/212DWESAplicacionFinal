<!DOCTYPE html>
<!--
        Descripción: CodigoPrograma
        Autor original: Carlos García Cachón
        Autor: Oscar Pascual Ferrero
        Fecha de creación/modificación: 12/02/2024
-->

<div class="container mt-3">
    <div class="row d-flex justify-content-start">
        <div class="col"><!-- Formulario donde recogemos los botones para ir a detalle o cerrar sesión -->
            <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="btn btn-secondary" aria-disabled="true" type="submit" name="cerrarSesion">Cerrar Sesion</button><br><br>
                <button class="btn btn-secondary" aria-disabled="true" type="submit" name="detalle">Detalle</button><br><br>
                <button class="btn btn-secondary" aria-disabled="true" type="submit" name="editarPerfil">Editar Perfil</button>
                <button class="btn btn-secondary" aria-disabled="true" type="submit" name="mtoParcela">Mto. Parcela</button><br><br>
                <button class="btn btn-secondary" aria-disabled="true" type="submit" name="apiREST">REST</button>
            </form>        
        </div>
        <div class="col">
            <?php
            /**
             * @author Carlos García Cachón
             * @version 1.0
             * @since 04/01/2024
             * @copyright Todos los derechos reservados a Carlos García
             * 
             * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cInicioPrivado' 
             * 
             */
            if ($numeroConexionesUsuario == 1) { // Compruebo si es la primera vez que se conecta y omito la fecha y hora de última conexión
                echo("<div>Bienvenid@ " . $descripcionUsuario . " esta es la " . $numeroConexionesUsuario . " vez que te conectas;</div>");
            } else {
                // Si se a conectado más veces muestro toda la información
                echo("<div>Bienvenid@ " . $descripcionUsuario . " esta es la " . $numeroConexionesUsuario . " vez que te conectas; "
                . "usted se conectó por última vez el " . $fechaHoraUltimaConexionAnterior . "</div>");
            }
            ?> 
        </div>
    </div>
