<?php namespace App\Models\WS;

class WSResponse
{
    /** @var bool */
    private $resultado;
    /** @var string */
    private $mensaje;
    /** @var \App\Models\WS\StockMaterial[] */
    private $stockMaterial;

    /**
     * Get the value of resultado
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set the value of resultado
     *
     * @return  self
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get the value of mensaje
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set the value of mensaje
     *
     * @return  self
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get the value of stockMaterial
     */
    public function getStockMaterial()
    {
        return $this->stockMaterial;
    }

    /**
     * Set the value of stockMaterial
     *
     * @return  self
     */
    public function setStockMaterial($stockMaterial)
    {
        $this->stockMaterial = new ArrayIterator($stockMaterial);

        return $this;
    }
}
