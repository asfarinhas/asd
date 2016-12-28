<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 27/12/16
 * Time: 20:19
 */
class TAREA_SHOWALL_Vista{
    private $array_datos;

    /**
     * TAREA_SHOWALL_Vista constructor.
     */
    public function __construct($array_datos){
        $this->array_datos = $array_datos;
    }

    public function getArrayDatos(){
        return $this->array_datos;
    }

    public function showView(){

    }

}