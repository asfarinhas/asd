<?php
// file: model/PostMapper.php
require_once(__DIR__ . "/../Models/PROYECTO_Model.php");
require_once(__DIR__ . "/../Models/MIEMBRO_Model.php");


/**
 * Class PostMapper
 *
 * Database interface for Post entities
 *
 * @author drdominguez
 */
class ProyectoMapper {

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



    //Listar todas las paginas
    function listar()
    {
        $this->ConectarBD();
        $sql = "select * from PROYECTO WHERE BORRADO ='0' ORDER BY ID_PROYECTO;";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{

            $toret=array();
            $i=0;
            while ($fila= $resultado->fetch_array()) {

                //$fila[9] =   new Miembro_Model(miembromapper->findById(  $fila[9]));
                $fila[9] = new Miembro_Model(2);//Insertamos un objeto en la posicion 10
                $fila[9]->setNombre("nombre".$i);//Le asignamos un nombre porque esta vacío
                $toret[$i]=$fila;

                $i++;
            }
            return $toret;

        }
    }


    function listarBorrados()
    {
        $this->ConectarBD();
        $sql = "select * from PROYECTO WHERE BORRADO ='1' ORDER BY ID_PROYECTO;";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{

            $toret=array();
            $i=0;
            while ($fila= $resultado->fetch_array()) {

                //$fila[9] =   new Miembro_Model(miembromapper->findById(  $fila[9]));
                $fila[9] = new Miembro_Model(2);//Insertamos un objeto en la posicion 10
                $fila[9]->setNombre("nombre".$i);//Le asignamos un nombre porque esta vacío
                $toret[$i]=$fila;

                $i++;
            }
            return $toret;

        }
    }


    /*Busca y lista todos los miembros de un proyecto*/
    public function listarMiembrosProyecto($id_proyecto)
    {
         $this ->conectarBD();
        $sql = "SELECT * FROM PROYECTO_MIEMBRO where ID_PROYECTO = $id_proyecto";

        if (!($resultado = $this->mysqli->query($sql))) {
            return false;
        } else {
            $miembros = $resultado->fetch_array(MYSQLI_ASSOC);

            $miembros_proyecto = array();

            foreach ($miembros as $row){
                $miembro = new Miembro_Model($row["NOMBRE"], $row["APELLIDOS"], $row["USUARIO"], $row["CONTRASEÑA"], $row["CORREO"]);
                array_push($miembros_proyecto, $miembro);
            }

            return $miembros_proyecto;

        }
    }



    //Buscar por.... lo que sea
  public function buscar(Proyecto $proyecto) {
      $this ->conectarBD();
    $sql = "SELECT * FROM PROYECTO WHERE ID_PROYECTO LIKE '%" . $proyecto->getIDPROYECTO(). "%' AND
         NOMBRE LIKE '%" . $proyecto->getNombre() . "%' AND
              FECHAI LIKE '%" . $proyecto->getFECHAI() . "%' AND
              FECHAIP LIKE '%" . $proyecto->getFECHAIP() . "%'AND 
              FECHAE LIKE '%" . $proyecto->getFECHAE() . "%'AND 
              FECHAFP LIKE '%" . $proyecto->getFECHAFP() . "%'AND 
             NUMEROHORAS LIKE '%" . $proyecto->getNUMEROHORAS() . "%'AND 
              DIRECTOR LIKE '%" . $proyecto->getDIRECTOR() . "%';";

      if (!($resultado = $this->mysqli->query($sql))){
          return 'Error en la consulta sobre la base de datos';
      }
      else{

          $toret=array();
          $i=0;
          while ($fila= $resultado->fetch_array()) {

              //$fila[9] =   new Miembro_Model(miembromapper->findById(  $fila[9]));
              $fila[9] = new Miembro_Model(2);//Insertamos un objeto en la posicion 10
              $fila[9]->setNombre("nombre".$i);//Le asignamos un nombre porque esta vacío
              $toret[$i]=$fila;

              $i++;
          }
          return $toret;

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
  public function buscarId($proyectoId){
      $this ->conectarBD();
    $sql = "SELECT * FROM PROYECTO WHERE ID_PROYECTO = '" . $proyectoId . "';";


      $resultado = $this->mysqli->query($sql);

      if($resultado->num_rows!=0){
          $proyecto= $resultado->fetch_array();

      }

      return $proyecto;

  }

//Buscar por nombre
    public function buscarNombre($proyectoNombre){
        $this ->conectarBD();
        $sql = "SELECT * FROM PROYECTO WHERE NOMBRE = '" . $proyectoNombre . "';";


        $resultado = $this->mysqli->query($sql);

        if($resultado ->num_rows!=0){
            $proyecto= $resultado->fetch_array();

        }

        return $proyecto;

    }

  public function insertar(Proyecto $proyecto) {
        $this->conectarBD();

        $sql= "SELECT * FROM PROYECTO WHERE NOMBRE ='" . $proyecto->getNOMBRE()."';";
            $resultado = $this->mysqli->query($sql);
            if($resultado->num_rows!=0){
                return "nombre de proyecto ya existe";
            }else{
                $sql = "INSERT INTO PROYECTO (ID_PROYECTO,NOMBRE,DESCRIPCION,FECHAI,FECHAIP,FECHAE,FECHAFP,NUMEROMIEMBROS,NUMEROHORAS,DIRECTOR) VALUES ('" . $proyecto->getIDPROYECTO()."','" . $proyecto->getNOMBRE() ."','" . $proyecto->getDESCRIPCION() . "','" . $proyecto->getFECHAI() . "','" . $proyecto->getFECHAIP() . "','" . $proyecto->getFECHAE() . "','" . $proyecto->getFECHAFP() . "','" . $proyecto->getNUMEROMIEMBROS(). "','" . $proyecto->getNUMEROHORAS()."','". $proyecto->getDIRECTOR()."');";
                if($this->mysqli->query($sql) === TRUE){
                    return "creado exito";
                }else{
                    return "error creado";
                }
            }

  }


    //Devuelve la información correspondiente a un proyecto
    function RellenaDatos($idProyecto)
    {
        $this->ConectarBD();
        $sql = "select * from PROYECTO where ID_PROYECTO = '". $idProyecto ."'";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{
            $result = $resultado->fetch_array();


            return $result;
        }
    }

    //Devuelve la información correspondiente a un proyecto
    function RellenaDatosMiembro($idMiembro)
    {
        $this->ConectarBD();
        $sql = "select * from EMPLEADOS where EMP_USER = '". $idMiembro ."'";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{
            $result = $resultado->fetch_array();


            return $result;
        }
    }



    /**
   * Updates a Post in the database
   *
   * @param Post $post The post to be updated
   * @throws PDOException if a database error occurs
   * @return void
   */
    public function modificar(Proyecto $proyecto) {

        if($proyecto->getBORRADO() == 'Activo'){
            $aux=0;
        }else{
            $aux=1;
        }
        $this->conectarBD();
        $sql = "UPDATE PROYECTO SET NOMBRE= '" . $proyecto->getNOMBRE() . "', DESCRIPCION = '" . $proyecto->getDESCRIPCION() . "', FECHAI ='" . $proyecto->getFECHAI() . "', FECHAIP ='" . $proyecto->getFECHAIP() . "', FECHAE ='" . $proyecto->getFECHAE() . "', FECHAFP = '" . $proyecto->getFECHAFP() . "', NUMEROMIEMBROS='" . $proyecto->getNUMEROMIEMBROS() . "', NUMEROHORAS='" . $proyecto->getNUMEROHORAS() . "', DIRECTOR= '" . $proyecto->getDIRECTOR() . "', BORRADO= '" . $aux . "' WHERE ID_PROYECTO= '" . $proyecto->getIDPROYECTO() . "';";


    if($this->mysqli->query($sql) === TRUE){
        return "modificacion exitosa";
    }else{
        return "error modificacion";
    }

  }

  /**
   * Deletes a Post into the database
   *
   * @param Post $post The post to be deleted
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function borrar(Proyecto $proyecto) {
      $this->conectarBD();
      $sql = "UPDATE PROYECTO SET BORRADO = '1' WHERE NOMBRE= '" . $proyecto->getNOMBRE()."';";
      
      if($this->mysqli->query($sql) === TRUE){
          return "El proyecto ha sido borrado correctamente";
      }else{
          return "error borrado";
      }
      
    
  }

}