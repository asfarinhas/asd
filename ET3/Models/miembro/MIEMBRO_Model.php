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
    public function __construct($DNI, $NOMBRE, $APELLIDO1, $APELLIDO2, $USUARIO, $CONTRASEÑA, $CORREO){
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

    private  function _setDNI($DNI){
        $this->DNI =  $DNI;
        return $this;
    }


    public function getNombre(){
        return $this->NOMBRE;
    }

    private function _setNombre($nombre){
        $this->NOMBRE = $nombre;
        return $this;
    }


    public function getApellido1(){
        return $this->APELIDO1;
    }

    private function _setApellido1($apellido1){
        $this->APELIDO1 = $apellido1;
        return $this;
    }


    public function getApellido2(){
        return $this->APELLIDO2;
    }

    private function _setApellido2($apellido2){
        $this->APELLIDO2 = $apellido2;
        return $this;
    }


    public function getUsuario(){
        return $this->USUARIO;
    }

    private function _setUsuario($usuario){
        $this->USUARIO = $usuario;
        return $this;
    }


    public function getContraseña(){
        return $this->CONTRASEÑA;
    }

    private function _setContraseña($contraseña){
        $this->CONTRASEÑA = $contraseña;
        return $this;
    }


    public function getCorreo(){
        return $this->CORREO;
    }

    private function _setCorreo($correo){
        $this->CORREO = $correo;
    }



}
?>
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 18/12/16
 * Time: 16:11
 */