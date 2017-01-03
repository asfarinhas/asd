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

  function buscarCorreos($empleados){
        $correos = array();
        $this->conectarBD();
        foreach($empleados as $m){
             $sql = "select EMP_EMAIL from EMPLEADOS where EMP_USER = '".$m."'";
             if($resultado = $this->mysqli->query($sql)){
                   $correos = $resultado->fetch_array();
             }
       }
       return $correos;
 }

 function listarMiembros()
{
     $this->ConectarBD();
     $sql = "select * from EMPLEADOS";
     if($resultado = $this->mysqli->query($sql)){
       $aux=$resultado->num_rows;
       while($aux>0){
         $notificacion[$resultado->num_rows - $aux] = $resultado->fetch_array();
         $aux = $aux -1;
       }
       return $notificacion;
     }
}

function insertar(Correo correo){
      mail($correo->getReceptor(),$correo->getAsunto(),$correo->getContenido());
      $this->ConectarBD();
      $sql = "INSERT INTO CORREO (ID_CORREO,EMISOR,RECEPTOR,ASUNTO,CONTENIDO,FECHAENVIO) VALUES('".$correo->getId()."','".$correo->getEmisor()."','".$correo->getReceptor()."','".$correo->getAsunto()."','".$correo->getContenido()."','".$correo->getFechaEnv()."');";
      if($resultado = $this->mysqli->query($sql)){
            return "enviado con exito";
      }

}
}
