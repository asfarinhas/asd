<?php

class Miembro_Model{

    private $NOMBRE;
    private $APELLIDOS;
    private $USUARIO;
    private $CONTRASEÑA;
    private $CORREO;

    /**
     * Miembro_Model constructor.
     * @param $NOMBRE
     * @param $APELLIDOS
     * @param $USUARIO ser el ID
     * @param $CONTRASEÑA
     * @param $CORREO
     */
    public function __construct( $NOMBRE=NULL, $APELLIDOS=NULL, $USUARIO=NULL, $CONTRASEÑA=NULL, $CORREO=NULL){

        $this->NOMBRE = $NOMBRE;
        $this->APELLIDOS = $APELLIDOS;
        $this->USUARIO = $USUARIO;
        $this->CONTRASEÑA = $CONTRASEÑA;
        $this->CORREO = $CORREO;

    }


    public function getNombre(){
        return $this->NOMBRE;
    }

    public function setNombre($nombre){
        $this->NOMBRE = $nombre;
    }


    public function getApellidos(){
        return $this->APELLIDOS;
    }

    public function setApellidos($apellidos){
        $this->APELLIDOS = $apellidos;
    }


    public function getUsuario(){
        return $this->USUARIO;
    }

    public function setUsuario($usuario){
        $this->USUARIO = $usuario;
    }


    public function getContraseña(){
        return $this->CONTRASEÑA;
    }

    public function setContraseña($contraseña){
        $this->CONTRASEÑA = $contraseña;
    }


    public function getCorreo(){
        return $this->CORREO;
    }

    public function setCorreo($correo){
        $this->CORREO = $correo;
    }



}
?>
