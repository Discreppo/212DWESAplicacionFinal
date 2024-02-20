<?php

/**
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 14/02/2024
 * 
 * @Annotation Proyecto AplicacionFinal - Clase Parcela 
 * 
 */
class Parcela {

    /**
     * Codigo del Parcela
     * @var string
     */
    private $codParcela;

    /**
     * Descripción del Parcela
     * @var string
     */
    private $descParcela;

    /**
     * Superficie de la Parcela
     * @var float
     */
    private $superficie;

    /**
     * Fecha y hora de la compra de la Parcela
     * @var DateTime
     */
    private $fechaCompra;

    /**
     * Uso de la Parcela
     * @var string
     */
    private $uso;

    /**
     * Precio de la Parcela
     * @var float
     */
    private $precio;

    /**
     * Fecha de baja de la Parcela
     * @var DateTime
     */
    private $fechaBaja;

    /**
     * Constructor de la clase Parcela
     * 
     * @param string $codParcela Código de la parcela
     * @param string $descParcela Descripción de la parcela
     * @param float $superficie Superficie de la parcela
     * @param DateTime $fechaCompra Fecha y hora de la compra de la parcela
     * @param string $uso Uso de la parcela
     * @param float $precio Precio de la parcela
     * @param DateTime $fechaBaja Fecha de baja de la parcela
     */
    public function __construct($codParcela, $descParcela, $superficie, $fechaCompra, $uso, $precio, $fechaBaja) {
        $this->codParcela = $codParcela;
        $this->descParcela = $descParcela;
        $this->superficie = $superficie;
        $this->fechaCompra = $fechaCompra;
        $this->uso = $uso;
        $this->precio = $precio;
        $this->fechaBaja = $fechaBaja;
    }

    /**
     * Obtiene el código de la parcela.
     *
     * @return string El código de la parcela.
     */
    public function getCodParcela() {
        return $this->codParcela;
    }

    /**
     * Obtiene la descripción de la parcela.
     *
     * @return string La descripción de la parcela.
     */
    public function getDescParcela() {
        return $this->descParcela;
    }

    /**
     * Obtiene la superficie de la parcela.
     *
     * @return float La superficie de la parcela.
     */
    public function getSuperficie() {
        return $this->superficie;
    }

    /**
     * Obtiene la fecha y hora de la compra de la parcela.
     *
     * @return DateTime La fecha y hora de la compra de la parcela.
     */
    public function getFechaCompra() {
        return $this->fechaCompra;
    }

    /**
     * Obtiene el uso de la parcela.
     *
     * @return string El uso de la parcela.
     */
    public function getUso() {
        return $this->uso;
    }

    /**
     * Obtiene el precio de la parcela.
     *
     * @return float El precio de la parcela.
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * Obtiene la fecha de baja de la parcela.
     *
     * @return DateTime La fecha de baja de la parcela.
     */
    public function getFechaBaja() {
        return $this->fechaBaja;
    }

    /**
     * Establece el código de la parcela.
     *
     * @param string $codParcela El nuevo código de la parcela.
     */
    public function setCodParcela($codParcela) {
        $this->codParcela = $codParcela;
    }

    /**
     * Establece la descripción de la parcela.
     *
     * @param string $descParcela La nueva descripción de la parcela.
     */
    public function setDescParcela($descParcela) {
        $this->descParcela = $descParcela;
    }

    /**
     * Establece la superficie de la parcela.
     *
     * @param float $superficie La nueva superficie de la parcela.
     */
    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    /**
     * Establece la fecha y hora de la compra de la parcela.
     *
     * @param DateTime $fechaCompra La nueva fecha y hora de la compra de la parcela.
     */
    public function setFechaCompra($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }

    /**
     * Establece el uso de la parcela.
     *
     * @param string $uso El nuevo uso de la parcela.
     */
    public function setUso($uso) {
        $this->uso = $uso;
    }

    /**
     * Establece el precio de la parcela.
     *
     * @param float $precio El nuevo precio de la parcela.
     */
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    /**
     * Establece la fecha de baja de la parcela.
     *
     * @param DateTime $fechaBaja La nueva fecha de baja de la parcela.
     */
    public function setFechaBaja($fechaBaja) {
        $this->fechaBaja = $fechaBaja;
    }
}
