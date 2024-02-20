
<!--
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
-->
<style>
    .ejercicio {
        text-align: justify;
    }
</style>
<div class="row d-flex justify-content-start">
    <div class="col">
        <form name="detalle" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button class="btn btn-secondary" aria-disabled="true" type="submit" name="salirDetalle">Salir</button>
        </form>        
    </div>
    <div class="col">
        <form name="editarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <table>
                    <tbody>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="codParcelaAMostrar">Código de Referencia:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="codParcelaAMostrar"
                                       value="<?php echo ($codParcelaAMostrar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="descParcelaAMostrar">Descripción de la Parcela:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="descParcelaAMostrar"
                                       value="<?php echo ($descParcelaAMostrar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="fechaNacimientoAMostrar">Fecha de Nacimiento:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="superficieAMostrar"
                                       value="<?php echo ($superficieAMostrar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="sexoAMostrar">Sexo:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="fechaCompraAMostrar"
                                       value="<?php echo ($fechaCompraAMostrar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="razaAMostrar">Raza:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="usoAMostrar"
                                       value="<?php echo ($usoAMostrar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="precioAMostrar">Precio:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="precioAMostrar"
                                       value="<?php echo ($precioAMostrar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <?php
                        if (!is_null($fechaBajaAMostrar)) {
                            echo ("<tr>
                                        <!-- Fecha Baja Parcela Deshabilitado -->
                                        <td class=\"d-flex justify-content-start modDep\">
                                            <label for=\"fechaBajaDepartamentoAMostrar\">Fecha de Baja:</label>
                                        </td>
                                        <td>
                                            <input class=\"bloqueado d-flex justify-content-start\" type=\"text\" name=\"fechaBajaParcelaAMostrar\"
                                                   value=\"$fechaBajaAMostrar\" disabled>
                                        </td>
                                        <td class=\"error\">
                                        </td>
                                    </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="botones" type="submit" name="salirDetalle">Salir</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>