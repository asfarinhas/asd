<?php
class Correo{

      private $id;
      private $emisor;
      private $receptor;
      private $asunto;
      private $contenido;
      private $fechaEnvio;

      public function __construct($id, $emisor, $receptor, $asunto, $contenido, $fechaEnvio){
            $this->id = $id;
		$this->emisor = $emisor;
		$this->receptor = $receptor;
            $this->asunto = $asunto;
		$this->contenido = $contenido;
		$this->fechaEnvio = $fechaEnvio;
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
	public function getAsunto(){
		return $this->asunto;
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
	private function _setAsunto($asunto){
		$this->asunto = $asunto;
	}
	private function _setContenido($contenido){
		$this->contenido = $contenido;
	}


}
?>
