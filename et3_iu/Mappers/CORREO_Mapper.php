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

      //Crear una instancia de PHPMailer
      $mail = new PHPMailer();
      //Definir que vamos a usar SMTP
      $mail->IsSMTP();
      //Esto es para activar el modo depuración en producción
      $mail->SMTPDebug  = 0;
       //Ahora definimos gmail como servidor que aloja nuestro SMTP
      $mail->Host       = 'smtp.gmail.com';
      //El puerto será el 587 ya que usamos encriptación TLS
       $mail->Port       = 587;
      //Definmos la seguridad como TLS
       $mail->SMTPSecure = 'tls';
       //Tenemos que usar gmail autenticados, así que esto a TRUE
      $mail->SMTPAuth   = true;
       //Definimos la cuenta que vamos a usar. Dirección completa de la misma
       $mail->Username   = "gestiondeproyectosiu@gmail.com";
      //Introducimos nuestra contraseña de gmail
      $mail->Password   = "proyectosiu";
      //Definimos el remitente (dirección y nombre)
      $mail->SetFrom('gestiondeproyectosiu@gmail.com', 'Proyectos');
      //Definimos el tema del email
      $mail->Subject = $correo->getAsunto();
      //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
      $mail->MsgHTML(utf8_decode($correo->getContenido()));
      //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
      $mail->AltBody = 'This is a plain-text message body';


       //indico destinatario
       $mail->addAddress($this->buscarCorreo($correo->getReceptor())[0]);


      //Enviamos el correo
      if(!$mail->Send()) {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      }



      $this->ConectarBD();
      $sql = "INSERT INTO CORREO (ID_CORREO,EMISOR,RECEPTOR,ASUNTO,CONTENIDO,FECHAENVIO) VALUES('".$correo->getId()."','".$correo->getEmisor()."','".$correo->getReceptor()."','".$correo->getAsunto()."','".$correo->getContenido()."','".$correo->getFechaEnv()."');";
      if($resultado = $this->mysqli->query($sql)){
            return 'enviado con exito';
      }

}
}
