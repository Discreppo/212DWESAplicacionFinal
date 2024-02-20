<?php

/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 14/02/2024
 * 
 * @Annotation Proyecto AplicacionFinal - Clase ParcelaPDO
 * 
 */
class ParcelaPDO {

    /**
     * Busca parcelas por su descripción.
     *
     * @param string $descParcela Descripción de la Parcela a buscar.
     * 
     * @return array[object] $aParcelas Array con todas las parcelas encontradas.
     * @return boolean false Si la consulta es incorrecta.
     */
    public static function buscaParcelasPorDesc($descParcela = '') {
        $aParcelas = [];

        $consulta = <<<CONSULTA
            SELECT * FROM T07_Parcela 
            WHERE T07_DescParcela LIKE '%$descParcela%'
            ORDER BY T07_DescParcela;
        CONSULTA;

        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta);

        if (!is_null($resultadoConsulta)) {
            while ($oParcela = $resultadoConsulta->fetchObject()) {
                $aParcelas[$oParcela->T07_CodParcela] = new Parcela(
                        $oParcela->T07_CodParcela,
                        $oParcela->T07_DescParcela,
                        $oParcela->T07_Superficie,
                        $oParcela->T07_FechaCompra,
                        $oParcela->T07_Uso,
                        $oParcela->T07_Precio,
                        $oParcela->T07_FechaBaja
                );
            }
            return $aParcelas;
        } else {
            return false;
        }
    }
    
    /**
     * Metodo que nos permite buscar una Parcela por el código 
     * 
     * @param string $codParcela El código de la Parcela
     * 
     * @return object Parcela | false Devuelve el objeto o 'false' si a ocurrido algún error
     */
    public static function buscarParcelaPorCod($codParcela) {
        //CONSULTA SQL - SELECT
        $consulta = <<<CONSULTA
            SELECT * FROM T06_Parcela 
            WHERE T06_CodParcela = '$codParcela';
        CONSULTA;

        $resultado = DBPDO::ejecutaConsulta($consulta); // Ejecuto la consulta

        if ($resultado->rowCount() > 0) { // Si la consulta tiene más de '0' valores
            $oParcela = $resultado->fetchObject(); // Guardo en la variable el resultado de la consulta en forma de objeto

            if ($oParcela) { // Instancio un nuevo objeto Parcela con todos sus datos
                return new Parcela(// Y lo devuelvo
                        $oParcela->T07_CodParcela,
                        $oParcela->T07_DescParcela,
                        $oParcela->T07_Superficie,
                        $oParcela->T07_FechaCompra,
                        $oParcela->T07_Uso,
                        $oParcela->T07_Precio,
                        $oParcela->T07_FechaBaja);
            } else {
                return $oParcela; // Devuelvo el objeto Parcela
            }
        } else {
            return false; // En caso de fallar devuelvo false
        }
    }
    
}
