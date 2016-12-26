<?php
// file: model/PostMapper.php
require_once(__DIR__ . "/../Models/NOTIFICACION_Model.php");
/**
 * Class PostMapper
 *
 * Database interface for Post entities
 *
 * @author drdominguez
 */
class NotificacionMapper {
  /**
   * Reference to the PDO connection
   * @var PDO
   */
  private $mysqli;
  public function conectarBD(){
      $this->mysqli = new mysqli("localhost","iu2016","iu2016","IU2016");
      if(mysqli_connect_errno()){
          echo "Fallo al conectar MySQL: " . $this->mysqli->connect_error();
      }
  }
  /**
   * Retrieves all posts
   *
   * Note: Comments are not added to the Post instances
   *
   * @throws PDOException if a database error occurs
   * @return mixed Array of Post instances (without comments)
   */
    //Listar todas las notificaciones enviadas
    function listarEnviadas()
    {
        $this->ConectarBD();
        $sql = "select * from NOTIFICACION where EMISOR='" . $_SESSION['user'] . "' ORDER BY FECHAENVIO;";
        $resultado = $this->mysql->query($sql);
        if (!$resultado->num_row > 0){
            return 'No hay notificaciones';
        }
        else{
          while($row = $resultado->fetch_array()) {
            if(strcmp($row['EMISOR'],$_SESSION['user']) != 0 )
              echo "<tr> <td>".$row['ID_NOTIFICACION']."</td> <td>".$row['EMISOR']."</td> <td>".$row['RECEPTOR']."</td> <td>".$row['FECHAENVIO']."</td> <td>".$row['FECHALECTURA']."</td> </tr>";
          }
        }
    }

    //Listar todas las notificaciones recibidas
    function listarRecibidas()
    {
        $this->ConectarBD();
        $sql = "select * from NOTIFICACION where RECEPTOR='" .$_SESSION['user'] . "' ORDER BY FECHAENVIO;";
        $resultado = $this->mysql->query($sql);
        if (!$resultado->num_row > 0){
            return 'No hay notificaciones';
        }
        else{
          while($row = $resultado->fetch_array()) {
            if(strcmp($row['RECEPTOR'],$_SESSION['user']) != 0 )
              echo "<tr> <td>".$row['ID_NOTIFICACION']."</td> <td>".$row['EMISOR']."</td> <td>".$row['RECEPTOR']."</td> <td>".$row['FECHAENVIO']."</td> </tr>";
          }
        }
    }

    function listarNotificacion($notificacion){
        $this->ConectarBD();
        $sql = "select * from NOTIFICACION where ID_NOTIFICACION='".$notificacion->getID."';";
        $resultado = $this->mysql->query($sql);
        if(!$resultado->num_row > 0){
          return 'No hay notificaciones';
        }else{
          while($row = $resultado->fetch_array()) {
            if(strcmp($row['RECEPTOR'],$_SESSION['user']) != 0 )
              echo "<tr> <td>".$row['ID_NOTIFICACION']."</td> <td>".$row['EMISOR']."</td> <td>".$row['RECEPTOR']."</td> <td>".$row['FECHAENVIO']."</td> </tr> <tr> <td>".row['CONTENIDO']."</td> </tr>";
          }
        }
    }

    function marcarLeido ($notificacion){
        $this->ConectarBD();
        $sql = "select * from NOTIFICACION where ID_NOTIFICACION='".$notificacion->getid()."';";
        $resultado = $this->mysql->query($sql);
        if(!$resultado->num_row > 0){
          return 'No hay notificaciones';
        }else{
          $sql = "UPDATE NOTIFICACION SET FECHALECTURA= '" .getdate(). "' WHERE ID_NOTIFICACION= '" . $notificacion->getId()."';";
        }
    }

  /**
   * Loads a Post from the database given its id
   *
   * Note: Comments are not added to the Post
   *
   * @throws PDOException if a database error occurs
   * @return Post The Post instances (without comments). NULL
   * if the Post is not found
   */
  //Buscar por id
  public function buscarEmisor($emisorId){
      $this ->conectarBD();
      $sql = "SELECT * FROM NOTIFICACION WHERE RECEPTOR = '" . $_SESSION['user'] . "' AND EMISOR = '" . $emisorId . "' ORDER BY FECHAENVIO;";
      $resultado = $this->mysqli->query($sql);
      if($resultado ->num_row!=0){
          $notificacion= $resultado->fetch_array();
      }
      return $notificacion;
  }
  //Buscar no leidas
  public function buscarNoLeidas(){
      $this ->conectarBD();
      $sql = "SELECT * FROM NOTIFICACION WHERE RECEPTOR = '" . $_SESSION['user'] "' AND FECHALECTURA = 'NULL' ORDER BY FECHAENVIO;";
      $resultado = $this->mysqli->query($sql);
      if($resultado ->num_row!=0){
          $notificacion= $resultado->fetch_array();
      }
      return $proyecto;
  }


    public function insertar(Notificacion $notificacion) {
        $this->conectarBD();
        $sql= "SELECT * FROM NOTIFICACION WHERE ID_NOTIFICACION ='" . $notificacion->getid() ."';";
            $resultado = $this->mysqli->query($sql);
            if($resultado->num_row!=0){
                return "error notificacion";
            }else{
                $sql = "INSERT INTO NOTIFICACION (ID_NOTIFICACION, EMISOR,RECEPTOR,CONTENIDO,FECHAENVIO,FECHALECTURA) VALUES ('" .$notificacion->getId() ."','" . $notificacion->getEmisor() ."','" . $notificacion->getReceptor() . "','" . $notificacion->getContenido() . "','" . $notificacion->getFechaEnv() . "','" . $notificacion->getFechaLec() . "');";
                if($this->mysqli->query($sql) === TRUE){
                    return "creado exito";
                }else{
                    return "error creado";
                }
            }
    }

    //Devuelve la información correspondiente a una notificacion
    function mostrarNotificacion($id)
    {
        $this->ConectarBD();
        $sql = "select * from NOTIFICACION where ID_NOTIFICACION = '".$id."'";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    public function borrar(Notificacion $notificacion) {
      $this->conectarBD();
      $sql = "select * from NOTIFICACION where ID_NOTIFICACION = '".$notificacion->getId()."'";
	  if (!($resultado = $this->mysqli->query($sql))){
		  return 'Error en la consulta sobre la base de datos';
	  }
	  else{
		  $sql = "select * from NOTIFICACION where ID_NOTIFICACION = '".$notificacion->getId()."' AND FECHALECTURA IS NULL";
		  if($this->mysqli->query($sql) === TRUE){
			  $sql = "DELETE FROM NOTIFICACION WHERE ID_NOTIFICACION = '".$notificacion->getId()."';";
		  }else{
			  return "Notificación aun no leída";
		  }
	  }


    }
  }
