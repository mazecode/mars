<?php namespace App\Models\WS;

class AreaVentas
{
    private $idioma;
    private $organizacionVentas;
    private $canalVentas;
    private $condicion;

    function __construct()
    {
        $this->idioma = null;
        $this->organizacionVentas = null;
        $this->canalVentas = null;
        $this->condicion = null;
    }

    /**
     * Get the value of idioma
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set the value of idioma
     *
     * @return  self
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get the value of organizacionVentas
     */
    public function getOrganizacionVentas()
    {
        return $this->organizacionVentas;
    }

    /**
     * Set the value of organizacionVentas
     *
     * @return  self
     */
    public function setOrganizacionVentas($organizacionVentas)
    {
        $this->organizacionVentas = $organizacionVentas;

        return $this;
    }

    /**
     * Get the value of canalVentas
     */
    public function getCanalVentas()
    {
        return $this->canalVentas;
    }

    /**
     * Set the value of canalVentas
     *
     * @return  self
     */
    public function setCanalVentas($canalVentas)
    {
        $this->canalVentas = $canalVentas;

        return $this;
    }

    /**
     * Get the value of condicion
     */
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Set the value of condicion
     *
     * @return  self
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;

        return $this;
    }
}
