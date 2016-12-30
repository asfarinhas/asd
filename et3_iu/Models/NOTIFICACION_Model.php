<?php
class Notificacion{

	//Métodos
	private $id;
	private $emisor;
	private $receptor;
	private $contenido;
	private $fechaEnvio;
	private $fechaLectura;



	//Constructor
	public function __construct($id , $emisor, $receptor, $contenido, $fechaEnvio, $fechaLectura=NULL){
		$this->id = $id;
		$this->emisor = $emisor;
		$this->receptor = $receptor;
		$this->fechaEnvio = $fechaEnvio;
		$this->fechaLectura = $fechaLectura;
		$this->contenido = $contenido;
	}
	
	//Getters
	public function getId(){
		return $this->id;
	}
	public function getEmisor(){
		return $this->emisor;
	}
	public function getReceptor(){
		return $this->receptor;
	}
	public function getFechaEnv(){
		return $this->fechaEnvio;
	}
	public function getFechaLec(){
		return $this->fechaLectura;
	}
	public function getContenido(){
		return $this->contenido;
	}

	//Setters
	private function _setId($id){
		$this->id = $id;
	}
	private function _setEmisor($emisor){
		$this->emisor = $emisor;
	}
	private function _setReceptor($receptor){
		$this->receptor = $receptor;
	}
	private function _setFechaEnv($fechaEnvio){
		$this->fechaEnvio = $fechaEnvio;
	}
	private function _setFechaLec($fechaLectura){
		$this->fechaLectura = $fechaLectura;
	}
	private function _setContenido($contenido){
		$this->contenido = $contenido;
	}



}
?>
