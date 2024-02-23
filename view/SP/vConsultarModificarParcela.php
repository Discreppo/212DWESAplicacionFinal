
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
        <form name="editarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <table>
                    <tbody>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="codParcelaAEditar">Código de Referencia:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="codParcelaAEditar"
                                       value="<?php echo ($codParcelaAEditar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="descParcelaAEditar">Descripción de la Parcela:</label>
                            </td>
                            <td>
                                <input class="d-flex justify-content-start obligatorio modDep" type="text" name="descParcelaAEditar" value="<?php echo (isset($_REQUEST['descParcelaAEditar']) ? $_REQUEST['descParcelaAEditar'] : $descParcelaAEditar ); ?>">
                                
                            </td>
                            <td class="error">
                                <?php
                                if (!empty($aErrores['descParcelaAEditar'])) {
                                    echo $aErrores['descParcelaAEditar'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="superficieAEditar">superficie :</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="superficieAEditar"
                                       value="<?php echo ($superficieAEditar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="fechaCompraAEditar">fecha compra:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="fechaCompraAEditar"
                                       value="<?php echo ($fechaCompraAEditar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="usoAEditar">Uso:</label>
                            </td>
                            <td>
                                <input class="bloqueado d-flex justify-content-start modDep" type="text" name="usoAEditar"
                                       value="<?php echo ($usoAEditar); ?>" disabled>
                            </td>
                            <td class="error">
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-start">
                                <label for="precioAEditar">Precio:</label>
                            </td>
                            <td>
                                <input class="obligatorio d-flex justify-content-start modDep" type="text" name="precioAEditar" value="<?php echo (isset($_REQUEST['precioAEditar']) ? $_REQUEST['precioAEditar'] : $precioAEditar); ?>">
                                
                            </td>
                            <td class="error">
                                <?php
                                if (!empty($aErrores['precioAEditar'])) {
                                    echo $aErrores['precioAEditar'];
                                }
                                ?>
                            </td>
                        </tr>
                        
                    </tbody>
                </table> 
                <div class="text-center">
                        <button class="btn btn-secondary" aria-disabled="true" type="submit" name="confirmarCambiosEditar">Confirmar Cambios</button>
                        <button class="btn btn-secondary" aria-disabled="true" type="submit" name="cancelarEditar">Cancelar</button>
                    </div>
            </fieldset>
        </form>
    </div>
</div>