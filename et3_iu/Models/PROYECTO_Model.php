<?php
class Proyecto
{

    private $ID_PROYECTO;
    private $NOMBRE;
    private $DESCRIPCION;
    private $FECHAI;
    private $FECHAIP;
    private $FECHAE;
    private $FECHAFP;
    private $NUMEROMIEMBROS;
    private $NUMEROHORAS;
    private $DIRECTOR;

    /**
     * Proyecto_Model constructor.
     * @param $ID_PROYECTO
     * @param $NOMBRE
     * @param $DESCRIPCION
     * @param $FECHAI
     * @param $FECHAIP
     * @param $FECHAE
     * @param $FECHAFP
     * @param $NUMEROMIEMBROS
     * @param $NUMEROHORAS
     * @param $DIRECTOR
     */
    public function __construct($ID_PROYECTO=NULL, $NOMBRE=NULL, $DESCRIPCION=NULL, $FECHAI=NULL, $FECHAIP=NULL, $FECHAE=NULL, $FECHAFP=NULL, $NUMEROMIEMBROS=NULL, $NUMEROHORAS=NULL, $DIRECTOR=NULL)
    {
        $this->ID_PROYECTO = $ID_PROYECTO;
        $this->NOMBRE = $NOMBRE;
        $this->DESCRIPCION = $DESCRIPCION;
        $this->FECHAI = $FECHAI;
        $this->FECHAIP = $FECHAIP;
        $this->FECHAE = $FECHAE;
        $this->FECHAFP = $FECHAFP;
        $this->NUMEROMIEMBROS = $NUMEROMIEMBROS;
        $this->NUMEROHORAS = $NUMEROHORAS;
        $this->DIRECTOR = $DIRECTOR;
    }

    /**
     * @return null
     */
    public function getIDPROYECTO()
    {
        return $this->ID_PROYECTO;
    }

    /**
     * @param null $ID_PROYECTO
     */
    public function setIDPROYECTO($ID_PROYECTO)
    {
        $this->ID_PROYECTO = $ID_PROYECTO;
    }

    /**
     * @return null
     */
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }

    /**
     * @param null $NOMBRE
     */
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;
    }

    /**
     * @return null
     */
    public function getDESCRIPCION()
    {
        return $this->DESCRIPCION;
    }

    /**
     * @param null $DESCRIOCION
     */
    public function setDESCRIPCION($DESCRIOCION)
    {
        $this->DESCRIPCION = $DESCRIPCION;
    }

    /**
     * @return null
     */
    public function getFECHAI()
    {
        return $this->FECHAI;
    }

    /**
     * @param null $FECHAI
     */
    public function setFECHAI($FECHAI)
    {
        $this->FECHAI = $FECHAI;
    }

    /**
     * @return null
     */
    public function getFECHAIP()
    {
        return $this->FECHAIP;
    }

    /**
     * @param null $FECHAIP
     */
    public function setFECHAIP($FECHAIP)
    {
        $this->FECHAIP = $FECHAIP;
    }

    /**
     * @return null
     */
    public function getFECHAE()
    {
        return $this->FECHAE;
    }

    /**
     * @param null $FECHAE
     */
    public function setFECHAE($FECHAE)
    {
        $this->FECHAE = $FECHAE;
    }

    /**
     * @return null
     */
    public function getFECHAFP()
    {
        return $this->FECHAFP;
    }

    /**
     * @param null $FECHAFP
     */
    public function setFECHAFP($FECHAFP)
    {
        $this->FECHAFP = $FECHAFP;
    }

    /**
     * @return null
     */
    public function getNUMEROMIEMBROS()
    {
        return $this->NUMEROMIEMBROS;
    }

    /**
     * @param null $NUMEROMIEMBROS
     */
    public function setNUMEROMIEMBROS($NUMEROMIEMBROS)
    {
        $this->NUMEROMIEMBROS = $NUMEROMIEMBROS;
    }

    /**
     * @return null
     */
    public function getNUMEROHORAS()
    {
        return $this->NUMEROHORAS;
    }

    /**
     * @param null $NUMEROHORAS
     */
    public function setNUMEROHORAS($NUMEROHORAS)
    {
        $this->NUMEROHORAS = $NUMEROHORAS;
    }

    /**
     * @return null
     */
    public function getDIRECTOR()
    {
        return $this->DIRECTOR;
    }

    /**
     * @param null $DIRECTOR
     */
    public function setDIRECTOR($DIRECTOR)
    {
        $this->DIRECTOR = $DIRECTOR;
    }

}
?>