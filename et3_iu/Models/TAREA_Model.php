<?php

class Tarea{

    private $id_tarea;
    private $nombre;
    private $descripcion;
    private $tarea_padre;
    private $fecha_inicio_plan;
    private $fecha_entrega_plan;
    private $fecha_inicio_real;
    private $fecha_entrega_real;
    private $horas_plan;
    private $horas_real;
    private $miembro; //tipo miembro/usuario
    //private $entregable;
    private $estado_tarea;
    private $comentario;

    public function __construct($id_tarea = NULL, $nombre=NULL, $descripcion=NULL, Tarea $tarea_padre=NULL, $fecha_inicio_plan=NULL, $fecha_entrega_plan=NULL, $fecha_inicio_real=NULL,
                                $fecha_entrega_real=NULL, $horas_plan=NULL, $horas_real=NULL, $miembro=NULL, /*array $entregable=NULL,*/ $estado_tarea=NULL, $comentario=NULL){

        $this->id_tarea = $id_tarea;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->tarea_padre = $tarea_padre;
        $this->fecha_inicio_plan = $fecha_inicio_plan;
        $this->fecha_entrega_plan = $fecha_entrega_plan;
        $this->fecha_inicio_real = $fecha_inicio_real;
        $this->fecha_entrega_real = $fecha_entrega_real;
        $this->horas_plan = $horas_plan;
        $this->horas_real = $horas_real;
        $this->miembro = $miembro;
       // $this->entregable = $entregable;
        $this->estado_tarea = $estado_tarea;
        $this->comentario = $comentario;
    }

    public function getIdTarea(){
        return $this->id_tarea;
    }

    /**
     * @param null $id_tarea
     */
    public function setIdTarea($id_tarea)
    {
        $this->id_tarea = $id_tarea;
    }

    /**
     * @return null
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param null $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return null
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param null $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return null
     */
    public function getTareaPadre()
    {
        return $this->tarea_padre;
    }

    /**
     * @param null $id_tarea_padre
     */
    public function setTareaPadre(Tarea $tarea_padre)
    {
        $this->tarea_padre = $tarea_padre;
    }

    /**
     * @return null
     */
    public function getFechaInicioPlan()
    {
        return $this->fecha_inicio_plan;
    }

    /**
     * @param null $fecha_inicio_plan
     */
    public function setFechaInicioPlan($fecha_inicio_plan)
    {
        $this->fecha_inicio_plan = $fecha_inicio_plan;
    }

    /**
     * @return null
     */
    public function getFechaEntregaPlan()
    {
        return $this->fecha_entrega_plan;
    }

    /**
     * @param null $fecha_entrega_plan
     */
    public function setFechaEntregaPlan($fecha_entrega_plan)
    {
        $this->fecha_entrega_plan = $fecha_entrega_plan;
    }

    /**
     * @return null
     */
    public function getFechaInicioReal()
    {
        return $this->fecha_inicio_real;
    }

    /**
     * @param null $fecha_inicio_real
     */
    public function setFechaInicioReal($fecha_inicio_real)
    {
        $this->fecha_inicio_real = $fecha_inicio_real;
    }

    /**
     * @return null
     */
    public function getFechaEntregaReal()
    {
        return $this->fecha_entrega_real;
    }

    /**
     * @param null $fecha_entrega_real
     */
    public function setFechaEntregaReal($fecha_entrega_real)
    {
        $this->fecha_entrega_real = $fecha_entrega_real;
    }

    /**
     * @return null
     */
    public function getHorasPlan()
    {
        return $this->horas_plan;
    }

    /**
     * @param null $horas_plan
     */
    public function setHorasPlan($horas_plan)
    {
        $this->horas_plan = $horas_plan;
    }

    /**
     * @return null
     */
    public function getHorasReal()
    {
        return $this->horas_real;
    }

    /**
     * @param null $horas_real
     */
    public function setHorasReal($horas_real)
    {
        $this->horas_real = $horas_real;
    }

    /**
     * @return null
     */
    public function getMiembro()
    {
        return $this->miembro;
    }

    /**
     * @param null $id_miembro
     */
    public function setMiembro($miembro)
    {
        $this->miembro = $miembro;
    }

    /**
     * @return null
     */
   /* public function getEntregable()
    {
        return $this->entregable;
    }

    public function setEntregable(array $entregable)
    {
        $this->entregable = $entregable;
    }*/

    /**
     * @return null
     */
    public function getEstadoTarea()
    {
        return $this->estado_tarea;
    }

    /**
     * @param null $estado_tarea
     */
    public function setEstadoTarea($estado_tarea)
    {
        $this->estado_tarea = $estado_tarea;
    }

    /**
     * @return null
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param null $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }


}
?>