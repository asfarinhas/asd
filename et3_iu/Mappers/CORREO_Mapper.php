<?php
// file: model/PostMapper.php
require_once(__DIR__ . "/../Models/CORREO_Model.php");

class CorreoMapper {

  private $mysqli;
  public function conectarBD(){
      $this->mysqli = new mysqli("localhost","iu2016","iu2016","IU2016");
      if(mysqli_connect_errno()){
          echo "Fallo al conectar MySQL: " . $this->mysqli->connect_error();
      }
  }

  function listarEnviadas()
  {
    $correo = array();
    $this ->conectarBD();
    $sql = "SELECT * FROM CORREO WHERE EMISOR = '" .$_SESSION['login']. "' ORDER BY FECHAENVIO";
    if($resultado = $this->mysqli->query($sql)){
      $aux=$resultado->num_rows;
      while($aux>0){
        $correo[$resultado->num_rows - $aux] = $resultado->fetch_array();
        $aux = $aux -1;
      }
      return $correo;
    }
  }

  }
