<?php namespace App\Models\WS;

class MaterialStock
{
    private $referenciaMaterial;
    private $descripcion;
    private $idFabricante;
    private $tipoMaterial;
    private $centro;
    private $almacen;
    private $unidad;
    private $stockLibre;
    private $stockBloqueado;
    private $stockConsignaLibre;
    private $stockConsignaBloqueado;
    private $stockBlogCNP;
    private $importe;
    private $moneda;
    private $importeCanon;
    private $tipoFabricante;

    /**
     * Get the value of referenciaMaterial
     */
    public function getReferenciaMaterial()
    {
        return $this->referenciaMaterial;
    }

    /**
     * Set the value of referenciaMaterial
     *
     * @return self
     */
    public function setReferenciaMaterial($referenciaMaterial)
    {
        $this->referenciaMaterial = $referenciaMaterial;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of idFabricante
     */
    public function getIdFabricante()
    {
        return $this->idFabricante;
    }

    /**
     * Set the value of idFabricante
     *
     * @return self
     */
    public function setIdFabricante($idFabricante)
    {
        $this->idFabricante = $idFabricante;

        return $this;
    }

    /**
     * Get the value of tipoMaterial
     */
    public function getTipoMaterial()
    {
        return $this->tipoMaterial;
    }

    /**
     * Set the value of tipoMaterial
     *
     * @return self
     */
    public function setTipoMaterial($tipoMaterial)
    {
        $this->tipoMaterial = $tipoMaterial;

        return $this;
    }

    /**
     * Get the value of centro
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * Set the value of centro
     *
     * @return self
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;

        return $this;
    }

    /**
     * Get the value of almacen
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * Set the value of almacen
     *
     * @return self
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get the value of unidad
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set the value of unidad
     *
     * @return self
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get the value of stockLibre
     */
    public function getStockLibre()
    {
        return $this->stockLibre;
    }

    /**
     * Set the value of stockLibre
     *
     * @return self
     */
    public function setStockLibre($stockLibre)
    {
        $this->stockLibre = $stockLibre;

        return $this;
    }

    /**
     * Get the value of stockBloqueado
     */
    public function getStockBloqueado()
    {
        return $this->stockBloqueado;
    }

    /**
     * Set the value of stockBloqueado
     *
     * @return self
     */
    public function setStockBloqueado($stockBloqueado)
    {
        $this->stockBloqueado = $stockBloqueado;

        return $this;
    }

    /**
     * Get the value of stockConsignaLibre
     */
    public function getStockConsignaLibre()
    {
        return $this->stockConsignaLibre;
    }

    /**
     * Set the value of stockConsignaLibre
     *
     * @return self
     */
    public function setStockConsignaLibre($stockConsignaLibre)
    {
        $this->stockConsignaLibre = $stockConsignaLibre;

        return $this;
    }

    /**
     * Get the value of stockConsignaBloqueado
     */
    public function getStockConsignaBloqueado()
    {
        return $this->stockConsignaBloqueado;
    }

    /**
     * Set the value of stockConsignaBloqueado
     *
     * @return self
     */
    public function setStockConsignaBloqueado($stockConsignaBloqueado)
    {
        $this->stockConsignaBloqueado = $stockConsignaBloqueado;

        return $this;
    }

    /**
     * Get the value of stockBlogCNP
     */
    public function getStockBlogCNP()
    {
        return $this->stockBlogCNP;
    }

    /**
     * Set the value of stockBlogCNP
     *
     * @return self
     */
    public function setStockBlogCNP($stockBlogCNP)
    {
        $this->stockBlogCNP = $stockBlogCNP;

        return $this;
    }

    /**
     * Get the value of importe
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return self
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get the value of moneda
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set the value of moneda
     *
     * @return self
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get the value of importeCanon
     */
    public function getImporteCanon()
    {
        return $this->importeCanon;
    }

    /**
     * Set the value of importeCanon
     *
     * @return self
     */
    public function setImporteCanon($importeCanon)
    {
        $this->importeCanon = $importeCanon;

        return $this;
    }

    /**
     * Get the value of tipoFabricante
     */
    public function getTipoFabricante()
    {
        return $this->tipoFabricante;
    }

    /**
     * Set the value of tipoFabricante
     *
     * @return self
     */
    public function setTipoFabricante($tipoFabricante)
    {
        $this->tipoFabricante = $tipoFabricante;

        return $this;
    }
}
