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
      $notificacion = array();
      $this ->conectarBD();
      $sql = "SELECT * FROM NOTIFICACION WHERE EMISOR = '" .$_SESSION['login']. "' ORDER BY FECHAENVIO";
      if($resultado = $this->mysqli->query($sql)){
        $aux=$resultado->num_rows;
        while($aux>0){
          $notificacion[$resultado->num_rows - $aux] = $resultado->fetch_array();
          $aux = $aux -1;
        }
        return $notificacion;
      }
    }

    //Listar todas las notificaciones recibidas
    function listarRecibidas()
    {
      $notificacion = array();
      $this ->conectarBD();
      $sql = "SELECT * FROM NOTIFICACION WHERE RECEPTOR = '" .$_SESSION['login']. "' ORDER BY FECHAENVIO";
      if($resultado = $this->mysqli->query($sql)){
        $aux=$resultado->num_rows;
        while($aux>0){
          $notificacion[$resultado->num_rows - $aux] = $resultado->fetch_array();
          $aux = $aux -1;
        }
        return $notificacion;
      }
    }

    function RellenaDatos($idNot){
      $this->ConectarBD();

      $sql = "select * from NOTIFICACION where ID_NOTIFICACION= '".$idNot."'";
      if(!($resultado = $this->mysqli->query($sql))){
        return 'Error consulta';
      }else{
          $result = $resultado->fetch_array();
          return $result;
      }
    }

    function listarNotificacion($notificacion){
        $this->ConectarBD();
        $sql = "select * from NOTIFICACION where ID_NOTIFICACION='".$notificacion->getID."';";
        $resultado = $this->mysqli->query($sql);
        if(!$resultado->num_rows > 0){
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
        $sql = "select * from NOTIFICACION where ID_NOTIFICACION='".$notificacion->getId()."';";
        $resultado = $this->mysqli->query($sql);
        if(!$resultado->num_rows > 0){
          return 'No hay notificaciones';
        }else{
          $sql = "UPDATE NOTIFICACION SET FECHALECTURA= '" .date('Y-m-d H:i:s'). "' WHERE ID_NOTIFICACION= '" . $notificacion->getId()."';";
          $resultado = $this->mysqli->query($sql);
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
  public function buscarId($Id){
      $this ->conectarBD();
      $sql = "SELECT * FROM NOTIFICACION WHERE ID_NOTIFICACION = '" . $Id . "'  ORDER BY FECHAENVIO;";

      $resultado = $this->mysqli->query($sql);
      if($resultado ->num_rows!=0){
          $notificacion= $resultado->fetch_array();
      }
      return $notificacion;
  }
  //Buscar no leidas. NO TOCAR BAJO NINGUN CONCEPTO!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  public function buscarNoLeidas(){
      $notificacion = array();
      $this ->conectarBD();
      $sql = "SELECT * FROM NOTIFICACION WHERE RECEPTOR = '" .$_SESSION['login']. "' AND FECHALECTURA ='0000-00-00' ";
      if($resultado = $this->mysqli->query($sql)){
        $aux=$resultado->num_rows;
        while($aux>0){
          $notificacion[$resultado->num_rows - $aux] = $resultado->fetch_array();
          $aux = $aux -1;
        }
        return $notificacion;
  }
}

    public function insertar(Notificacion $notificacion) {
        $this->conectarBD();
        $sql= "SELECT * FROM NOTIFICACION WHERE ID_NOTIFICACION ='" . $notificacion->getid() ."';";
            $resultado = $this->mysqli->query($sql);
            if($resultado->num_rows!=0){
                return "error notificacion";
            }else{
                $sql = "INSERT INTO NOTIFICACION (ID_NOTIFICACION, EMISOR,RECEPTOR,CONTENIDO,FECHAENVIO,FECHALECTURA) VALUES ('" .$notificacion->getId() ."','" . $notificacion->getEmisor() ."','" . $notificacion->getReceptor() . "','" . $notificacion->getContenido() . "','" . $notificacion->getFechaEnv() . "','" . $notificacion->getFechaLec() . "');";
                if($this->mysqli->query($sql) === TRUE){
                    return "creado exitoN";
                }else{
                    return "error creadoP";
                }
            }
    }

    public function buscar(Notificacion $notificacion) {
        $this ->conectarBD();
      $sql = "SELECT * FROM PROYECTO WHERE
                ID_PROYECTO LIKE '%" . $notificacion->getId(). "%' AND
                EMISOR LIKE '%" . $notificacion->getEmisor() . "%' AND
                RECEPTOR LIKE '%" . $notificacion->getReceptor() . "%' AND
                FECHAENVIO LIKE '%" . $notificacion->getFechaEnv() . "%'AND
                FECHALECTURA LIKE '%" . $notificacion->getFechaLec() . "%';";

        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{

            $toret=array();
            $i=0;
            while ($fila= $resultado->fetch_array()) {

                //$fila[9] =   new Miembro_Model(miembromapper->findById(  $fila[9]));
                $fila[9] = new Notificacion_Model(2);//Insertamos un objeto en la posicion 10
                $fila[9]->setId("Id".$i);//Le asignamos un nombre porque esta vacío
                $toret[$i]=$fila;

                $i++;
            }
            return $toret;

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
		  $sql = "select * from NOTIFICACION where ID_NOTIFICACION = '".$notificacion->getId()."'";
      $resultado = $this->mysqli->query($sql);
		  if($resultado->num_rows > 0){
			  $sql = "DELETE FROM NOTIFICACION WHERE ID_NOTIFICACION = '".$notificacion->getId()."'";
        if($this->mysqli->query($sql) === TRUE){
            return "borrado exitoN";
        }else{
            return "error borradoN";
        }
		  }
	  }


    }
  }
