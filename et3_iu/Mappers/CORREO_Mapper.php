<?php
// file: model/PostMapper.php
require_once(__DIR__ . "/../Models/CORREO_Model.php");
include '../PHPMailer/class.phpmailer.php';

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
  public function buscarId($Id){
      $this ->conectarBD();
      $sql = "SELECT * FROM CORREO WHERE ID_CORREO = '" . $Id . "'  ORDER BY FECHAENVIO;";

      $resultado = $this->mysqli->query($sql);
      if($resultado ->num_rows!=0){
          $correo= $resultado->fetch_array();
      }
      return $correo;
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
 function buscarCorreo($empleado){
      $this->conectarBD();
      $sql = "select EMP_EMAIL from EMPLEADOS where EMP_USER = '".$empleado."'";
      if($resultado = $this->mysqli->query($sql)){
            $correo = $resultado->fetch_array();
      }
      return $correo;
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

function insertar(Correo $correo){
      //instancio un objeto de la clase PHPMailer
      $mail = new PHPMailer(); // defaults to using php "mail()"

      //defino el cuerpo del mensaje en una variable $body
      //se trae el contenido de un archivo de texto
      $body = $correo->getContenido();
      //Esta línea la he tenido que comentar
      //porque si la pongo me deja el $body vacío
      // $body = preg_replace('/[]/i','',$body);

      //defino el email y nombre del remitente del mensaje
      $mail­>SetFrom(buscarCorreo($correo->getEmisor()), $correo->getEmisor());

      //defino la dirección de email de "reply", a la que responder los mensajes
      //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
      $mail­>AddReplyTo(buscarCorreo($correo->getEmisor()), $correo->getEmisor());
      //Defino la dirección de correo a la que se envía el mensaje
      $address = buscarCorreo($correo->getReceptor());
      //la añado a la clase, indicando el nombre de la persona destinatario
      $mail­>AddAddress($address, $correo->getReceptor());

      //Añado un asunto al mensaje
      $mail­>Subject = $correo->getAsunto();

      //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
      //$mail­>AltBody = "Cuerpo alternativo del mensaje";

      //inserto el texto del mensaje en formato HTML
      $mail­>MsgHTML($body);

      //asigno un archivo adjunto al mensaje
      //$mail­>AddAttachment("ruta/archivo_adjunto.gif");

      //envío el mensaje, comprobando si se envió correctamente
      if(!$mail­>Send()) {
      echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
      } else {
      echo "Mensaje enviado!!";
      }

      $this->ConectarBD();
      $sql = "INSERT INTO CORREO (ID_CORREO,EMISOR,RECEPTOR,ASUNTO,CONTENIDO,FECHAENVIO) VALUES('".$correo->getId()."','".$correo->getEmisor()."','".$correo->getReceptor()."','".$correo->getAsunto()."','".$correo->getContenido()."','".$correo->getFechaEnv()."');";
      if($resultado = $this->mysqli->query($sql)){
            return 'enviado con exito';
      }

}
}
