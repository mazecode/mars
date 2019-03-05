<?php namespace App\Models\WS;

class Material
{
    private $centro;
    private $consultaCNP;
    private $tienda;
    private $preferenciaMaterial;
    private $almacen;
    private $stockCero;
    private $stockLibre;
    private $tipos;
    private $almacenes;
    private $materiales;
    private $areaVentas;
    private $stockCompleto;
    private $referenciaMaterial;

    public function __construct()
    {
        $this->centro = null;
        $this->consultaCNP = null;
        $this->tienda = null;
        $this->preferenciaMaterial = null;
        $this->almacen = null;
        $this->stockCero = null;
        $this->stockLibre = null;
        $this->tipos = null;
        $this->almacenes = null;
        $this->materiales = null;
        $this->areaVentas = null;
        $this->stockCompleto = null;
        $this->referenciaMaterial = null;
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
     * @return  self
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;

        return $this;
    }

    /**
     * Get the value of consultaCNP
     */
    public function getConsultaCNP()
    {
        return $this->consultaCNP;
    }

    /**
     * Set the value of consultaCNP
     *
     * @return  self
     */
    public function setConsultaCNP($consultaCNP)
    {
        $this->consultaCNP = $consultaCNP;

        return $this;
    }

    /**
     * Get the value of tienda
     */
    public function getTienda()
    {
        return $this->tienda;
    }

    /**
     * Set the value of tienda
     *
     * @return  self
     */
    public function setTienda($tienda)
    {
        $this->tienda = $tienda;

        return $this;
    }

    /**
     * Get the value of preferenciaMaterial
     */
    public function getPreferenciaMaterial()
    {
        return $this->preferenciaMaterial;
    }

    /**
     * Set the value of preferenciaMaterial
     *
     * @return  self
     */
    public function setPreferenciaMaterial($preferenciaMaterial)
    {
        $this->preferenciaMaterial = $preferenciaMaterial;

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
     * @return  self
     */
    public function setAlmacen($almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get the value of stockCero
     */
    public function getStockCero()
    {
        return $this->stockCero;
    }

    /**
     * Set the value of stockCero
     *
     * @return  self
     */
    public function setStockCero($stockCero)
    {
        $this->stockCero = $stockCero;

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
     * @return  self
     */
    public function setStockLibre($stockLibre)
    {
        $this->stockLibre = $stockLibre;

        return $this;
    }

    /**
     * Get the value of tipos
     */
    public function getTipos()
    {
        return $this->tipos;
    }

    /**
     * Set the value of tipos
     *
     * @return  self
     */
    public function setTipos(Tipo ...$tipos)
    {
        $this->tipos = new ArrayIterator($tipos);

        return $this;
    }

    /**
     * Get the value of almacenes
     */
    public function getAlmacenes()
    {
        return $this->almacenes;
    }

    /**
     * Set the value of almacenes
     *
     * @return  self
     */
    public function setAlmacenes(...$almacenes)
    {
        $this->almacenes = new ArrayIterator($almacenes);

        return $this;
    }

    /**
     * Get the value of materiales
     */
    public function getMateriales()
    {
        return $this->materiales;
    }

    /**
     * Set the value of materiales
     *
     * @return  self
     */
    public function setMateriales(Material ...$materiales)
    {
        $this->materiales = new ArrayIterator($materiales);

        return $this;
    }

    /**
     * Get the value of areaVentas
     */
    public function getAreaVentas()
    {
        return $this->areaVentas;
    }

    /**
     * Set the value of areaVentas
     *
     * @return  self
     */
    public function setAreaVentas(AreaVentas $areaVentas)
    {
        $this->areaVentas = $areaVentas;

        return $this;
    }

    /**
     * Get the value of stockCompleto
     */
    public function getStockCompleto()
    {
        return $this->stockCompleto;
    }

    /**
     * Set the value of stockCompleto
     *
     * @return  self
     */
    public function setStockCompleto($stockCompleto)
    {
        $this->stockCompleto = $stockCompleto;

        return $this;
    }

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
     * @return  self
     */
    public function setReferenciaMaterial($referenciaMaterial)
    {
        $this->referenciaMaterial = $referenciaMaterial;

        return $this;
    }
}
