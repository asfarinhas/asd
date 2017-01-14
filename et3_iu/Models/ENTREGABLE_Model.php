<?php

/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 13/01/2017
 * Time: 16:10
 */
class Entregable
{

    /**
     * @var integer
     */
    private $ID_ENTREGABLE;
    /**
     * @var string
     */
    private $NOMBRE;
    /**
     * @var string
     */
    private $ESTADO;
    /**
     * @var string
     */
    private $URL;
    /**
     * @var Miembro
     */
    private $MIEMBRO;
    /**
     * @var DateTime
     */
    private $FECHASUBIDA;
    /**
     * @var Tarea
     */
    private $TAREA;


    /**
     * Entregable constructor.
     * @param null $id
     * @param null $nombre
     * @param null $estado
     * @param null $url
     * @param Miembro|null $miembro
     * @param DateTime|null $fechaSubida
     * @param Tarea|null $tarea
     */
    public function __construct($id = null, $nombre = null, $estado = null, $url = null,Miembro $miembro = null,DateTime $fechaSubida = null,Tarea $tarea = null){
        $this->ID_ENTREGABLE = $id;
        $this->NOMBRE = $nombre;
        $this->ESTADO = $estado;
        $this->URL = $url;
        $this->MIEMBRO = $miembro;
        $this->FECHASUBIDA = $fechaSubida;
        $this->TAREA = $tarea;

    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID_ENTREGABLE;
    }

    /**
     * @param mixed $ID_ENTREGABLE
     */
    public function setID($ID_ENTREGABLE)
    {
        $this->ID_ENTREGABLE = $ID_ENTREGABLE;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->NOMBRE;
    }

    /**
     * @param mixed $NOMBRE
     */
    public function setNombre($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->ESTADO;
    }

    /**
     * @param mixed $ESTADO
     */
    public function setEstado($ESTADO)
    {
        $this->ESTADO = $ESTADO;
    }

    /**
     * @return mixed
     */
    public function getURL()
    {
        return $this->URL;
    }

    /**
     * @param mixed $URL
     */
    public function setURL($URL)
    {
        $this->URL = $URL;
    }

    /**
     * @return mixed
     */
    public function getMiembro()
    {
        return $this->MIEMBRO;
    }

    /**
     * @param mixed $MIEMBRO
     */
    public function setMiembro(Miembro $MIEMBRO)
    {
        $this->MIEMBRO = $MIEMBRO;
    }

    /**
     * @return mixed
     */
    public function getFechaSubida()
    {
        return $this->FECHASUBIDA;
    }

    /**
     * @param mixed $FECHASUBIDA
     */
    public function setFechaSubida($FECHASUBIDA)
    {
        $this->FECHASUBIDA = $FECHASUBIDA;
    }

    /**
     * @return Tarea
     */
    public function getTarea()
    {
        return $this->TAREA;
    }

    /**
     * @param Tarea $TAREA
     */
    public function setTarea(Tarea $TAREA)
    {
        $this->TAREA = $TAREA;
    }


}