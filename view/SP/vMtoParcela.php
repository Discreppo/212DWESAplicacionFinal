<!DOCTYPE html>
<!--
        Descripción: Aplicación Final - vMtoParcela.php
        Autor original: Carlos García Cachón
        Autor: Oscar Pascual Ferrero
        Fecha de creación/modificación: 19/02/2024
-->

<div class="container mt-3">
    <div class="row d-flex justify-content-start">
        <div class="row"><!-- Formulario donde recogemos los botones para ir a detalle o cerrar sesión -->
            <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="btn btn-secondary" role="button" aria-disabled="true" type="submit" name="salirParcela">Salir</button>
            </form>        
        </div>
        <div class="col">
            <form name="buscarParcela" id="buscarParcela" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <table class="bordeBusquedaParcela">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <!-- CodParcela Obligatorio -->
                                <td class="d-flex justify-content-start" colspan='2'>
                                    <label for="DescParcela">Descripción:</label>
                                </td>
                                <td>                                                                                               
                                    <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                    <input class="d-flex justify-content-start" type="text" name="DescParcela" value="<?php echo $_SESSION['criterioBusquedaParcela']['descripcionBuscada'] ?? ''; ?>">
                                    
                                    <div>
                                        <p class="pBuscarParcela">Estado: </p>
                                        <label for="tipoParcelaTodos"><a class="rFiltrarParcela">Todos</a></label>
                                        <input name="estado" id="tipoParcelaTodos" type="radio" value="todos" <?php echo isset($_SESSION['criterioBusquedaParcela']['estado']) ? ($_SESSION['criterioBusquedaParcela']['estado'] == ESTADO_TODOS ? 'checked' : '') : ''; ?>>
                                        <label for="tipoParcelaAltas"><a class="rFiltrarParcela">Altas</a></label>
                                        <input name="estado" id="tipoParcelaAltas" type="radio" value="altas" <?php echo isset($_SESSION['criterioBusquedaParcela']['estado']) ? ($_SESSION['criterioBusquedaParcela']['estado'] == ESTADO_ALTAS ? 'checked' : '') : 'checked'; ?>>
                                        <label for="tipoParcelaBajas"><a class="rFiltrarParcela">Bajas</a></label>
                                        <input name="estado" id="tipoParcelaBajas" type="radio" value="bajas" <?php echo isset($_SESSION['criterioBusquedaParcela']['estado']) ? ($_SESSION['criterioBusquedaParcela']['estado'] == ESTADO_BAJAS ? 'checked' : '') : ''; ?>>
                                    </div>
                                    
                                </td>
                                <td><button class="btn btn-secondary" role="button" aria-disabled="true" type="submit" name="buscarParcelaPorDesc">Buscar</button></td>
                            </tr>                            
                            <tr>
                                <td class="error error-MtoDep" colspan="3">
                                    <?php
                                    if (!empty($aErrores['DescParcela'])) {
                                        echo $aErrores['DescParcela'];
                                    }
                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </fieldset>
            </form>
            
            <?php
            if ($aVMtoParcelas != null) {
                echo ("<div class='list-group text-center tablaMuestra'>");
                echo ("<table>
                        <thead>
                        <tr>
                            <th>Código De Referencia</th>
                            <th>Descripción de la parcela <i class='fas fa-arrow-up'></i></th>
                            <th>Superficie</th>
                            <th>Fecha de compra</th>
                            <th>Uso</th>
                            <th>Precio de la Parcela</th>
                            <th>Fecha de Baja</th>
                            <th colspan='4'><-T-></th>
                        </tr>
                        </thead>");
                echo ("<tbody>");
            }
            ?>
            <?php
            if ($aVMtoParcelas) {

                foreach ($aVMtoParcelas as $aParcela) {//Recorro el objeto del resultado que contiene un array
                    echo ("<tr class='" . (empty($aParcela['fechaBajaParcela']) ? 'sin-baja' : 'con-baja') . "'>");

                    echo ("<td>" . $aParcela['codParcela'] . "</td>");
                    echo ("<td>" . $aParcela['descParcela'] . "</td>");
                    echo ("<td>" . $aParcela['superficieParcela'] . "</td>");
                    echo ("<td>" . $aParcela['fechaCompraParcela'] . "</td>");
                    echo "<td>";
                    if ($aParcela['usoParcela'] == 'Regadío') {
                        echo "Regadío 💧"; // Icono de Regadío
                    } else {
                        echo "Secano 🚱"; // Icono de Secano
                    }
                    echo "</td>";
                    echo ("<td>" . $aParcela['precioParcela'] . "</td>");
                    echo ("<td class='fecha-baja'>" . $aParcela['fechaBajaParcela'] . "</td>");

                    // Formulario para editar
                    echo ("<td>");
                    // Compruebo la variable que almacena la fecha de baja para mostrar/ocultar el elemento
                    if (empty($aParcela['fechaBajaParcela'])) {
                        echo ("<form method='post'>");
                        echo ("<input type='hidden' name='cConsultarModificarParcela' value='" . $aParcela['codParcela'] . "'>");
                        echo ("<button type='submit'><img src='webroot/media/images/consultarModificarDepartamento.png' alt='EDIT'></button>");
                        echo ("</form>");
                    }
                    echo ("</td>");

                    // Formulario para eliminar
                    echo ("<td>");
                    echo ("<form method='post'>");
                    echo ("<input type='hidden' name='cDetalleParcela' value='" . $aParcela['codParcela'] . "'>");
                    echo ("<button type='submit'><img src='webroot/media/images/eliminarDepartamento.png' alt='DELETE'></button>");
                    echo ("</form>");
                    echo ("</td>");

                    // Formulario para alta lógica
                    echo ("<td>");
                    // Compruebo la variable que almacena la fecha de baja para mostrar/ocultar el elemento
                    if (!empty($aParcela['fechaBajaParcela'])) {
                        echo ("<form method='post'>");
                        echo ("<input type='hidden' name='cRehabilitacionParcela' value='" . $aParcela['codParcela'] . "'>");
                        echo ("<button type='submit'><img src='webroot/media/images/flechaAlta.png' alt='ALTA'></button>");
                        echo ("</form>");
                    }
                    echo ("</td>");

                    // Formulario para baja lógica
                    echo ("<td>");
                    // Compruebo la variable que almacena la fecha de baja para mostrar/ocultar el elemento
                    if (empty($aParcela['fechaBajaParcela'])) {
                        echo ("<form method='post'>");
                        echo ("<input type='hidden' name='cBajaLogicaParcela' value='" . $aParcela['codParcela'] . "'>");
                        echo ("<button type='submit'><img src='webroot/media/images/flechaBaja.png' alt='BAJA'></button>");
                        echo ("</form>");
                    }
                    echo ("</td>");

                    echo ("</tr>");
                }
            }
            if ($aVMtoParcelas != null) {
                echo ("</tbody>");
                echo ("</table>");
                echo ("</div>");
            }
            ?>
        </div>
    </div>
