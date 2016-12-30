<?php
// file: model/PostMapper.php
require_once(__DIR__ . "/../Models/CORREO_Model.php");

class NotificacionMapper {

  private $mysqli;
  public function conectarBD(){
      $this->mysqli = new mysqli("localhost","iu2016","iu2016","IU2016");
      if(mysqli_connect_errno()){
          echo "Fallo al conectar MySQL: " . $this->mysqli->connect_error();
      }
  }



  }
