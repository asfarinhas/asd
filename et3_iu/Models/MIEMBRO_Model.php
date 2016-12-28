<?php
class Miembro_Model{

    private $DNI;
    private $NOMBRE;
    private $APELIDO1;
    private $APELLIDO2;
    private $USUARIO;
    private $CONTRASEÑA;
    private $CORREO;

    /**
     * Miembro_Model constructor.
     * @param $DNI
     * @param $NOMBRE
     * @param $APELLIDO1
     * @param $APELLIDO2
     * @param $USUARIO
     * @param $CONTRASEÑA
     * @param $CORREO
     */
    public function __construct($DNI=NULL, $NOMBRE=NULL, $APELLIDO1=NULL, $APELLIDO2=NULL, $USUARIO=NULL, $CONTRASEÑA=NULL, $CORREO=NULL){
        $this->DNI = $DNI;
        $this->NOMBRE = $NOMBRE;
        $this->APELIDO1 = $APELLIDO1;
        $this->APELLIDO2 = $APELLIDO2;
        $this->USUARIO = $USUARIO;
        $this->CONTRASEÑA = $CONTRASEÑA;
        $this->CORREO = $CORREO;

    }


    public function getDNI(){
        return $this->DNI;
    }

    public function setDNI($DNI){
        $this->DNI =  $DNI;
    }


    public function getNombre(){
        return $this->NOMBRE;
    }

    public function setNombre($nombre){
        $this->NOMBRE = $nombre;
    }


    public function getApellido1(){
        return $this->APELIDO1;
    }

    public function setApellido1($apellido1){
        $this->APELIDO1 = $apellido1;
    }


    public function getApellido2(){
        return $this->APELLIDO2;
    }

    public function setApellido2($apellido2){
        $this->APELLIDO2 = $apellido2;
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
