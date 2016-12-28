<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../Models/PROYECTO_Model.php");
require_once (__DIR__ . "/../Models/MIEMBRO_Model.php");
require_once(__DIR__ . "/../Models/TAREA_Model.php");
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 27/12/16
 * Time: 9:49
 */
class TAREA_Mapper{

    private $mysqli;

    /**
     *Creación de la conexión a la BD
     */
    public function conectarBD(){
        $this->mysqli = new mysqli("localhost","iu2016","iu2016","IU2016");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    /**
     * Lista todas la tareas asignadas a un miembro
     * @param $idMiembro
     * Devuelve el array con toda la información de las tareas asignadas a un miembro
     */
    function listarTareasMiembro($idMiembro){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE ID_MIEMBRO = '" . $idMiembro . "' ORDER BY FECHAIP";

        if(!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }else{
            $tareas = $resultado->fetch_assoc();
            return $tareas;
        }
    }

    /**
    *Lista las tareas con padre X
    */
    function listarTareasPadre(Tarea $padre){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE PADRE = '" . $padre->getTareaPadre() . "' ORDER BY FECHAIP";

        if(!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }else{
            $row = $fila = $resultado->fetch_assoc()
        }
    }

    /**
     * Lista las tareas de X miembro que estén sin acabar (<100%)
     * @param $idMiembro
     * @return string
     */
    function listarTareasPendientesMiembro(Miembro $miembro){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE ID_MIEMBRO = '" . $idMiembro . "' AND  ESTADO < 100 ORDER BY FECHAIP";

        if(!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }else{
            $tareas = $resultado->fetch_array();
            return $tareas;
        }
    }


    /**
     *Insertar una tarea
     */
    function insertarTarea(Tarea $tarea){
        $this->conectarBD();

        $sql = "SELECT * FORM TAREA WHERE NOMBRE = '". $tarea->getNombre() . "' ";
        $resultado = $this->mysqli->query($sql);
        if($resultado->num_rows != 0){
            return "Nombre de tarea ya existe. ";
        }else{
            $sql = "INSERT INTO TAREA (PADRE,ID_TAREA,NOMBRE,FECHAIP,FECHAIR,FECHAEP,FECHAER,HORASP,HORASR,ID_MIEMBRO,
                    DESCRIPCION,ESTADO,COMENTARIO) VALUES ('" . $tarea->getTareaPadre()."','" . $tarea->getIdTarea()."','" .
                    $tarea->getNombre()."','" . $tarea->getFechaInicioPlan()."','" . $tarea->getFechaInicioReal()."','" .
                    $tarea->getFechaEntregaPlan()."','" . $tarea->getFechaEntregaReal()."','" . $tarea->getHorasPlan()."','" .
                    $tarea->getHorasReal()."','" . $tarea->getMiembro()."','" . $tarea->getDescripcion()."','" . $tarea->getEstadoTarea()."','".$tarea->getComentario()."');";

            if($this->mysqli->query($sql) === TRUE){
                return "Creado con éxito. ";
            }else{
                return "Error en la creación. ";
            }
        }
    }


    /**
     * Modificar una tarea
     */
    function modificarTarea(Tarea $tarea){
        $this->conectarBD();

        $sql = "UPDATE TAREA SET PADRE = '" . $tarea->getTareaPadre() . "', ID_TAREA = '" . $tarea->getIdTarea() ."', 
                    NOMBRE = '" . $tarea->getNombre() . "', 
                    FECHAIP = '" . $tarea->getFechaEntregaPlan() . "', 
                    FECHAIR = '" . $tarea->getFechaInicioReal() . "', 
                    FECHAEP = '" . $tarea->getFechaEntregaPlan() . "', 
                    FECHAER = '" . $tarea->getFechaEntregaReal() . "',
                    HORASP = '" . $tarea->getHorasPlan() . "', 
                    HORASR = '" . $tarea->getHorasReal() . "',
                    ID_MIEMBRO = '" . $tarea->getMiembro() . "', 
                    DESCRIPCION = '" . $tarea->getDescripcion() . "',
                    ESTADO = '" . $tarea->getEstadoTarea() . "', 
                    COMENTARIO = '" . $tarea->getEstadoTarea() . "';";

        if($this->mysqli->query($sql) === TRUE){
            return "Modificada con éxito con éxito. ";
        }else{
            return "Error en la modificación. ";
        }
    }

    /**
     * Elimina una tarea dada por su nombre y su id
     * @param Tarea $tarea
     */
    function borrarTarea(Tarea $tarea){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE NOMBRE = '" . $tarea->getNombre() . "';";
        if(!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos. ';
        }else{
            $sql = "DELETE FROM TAREA WHERE NOMBRE = '" . $tarea->getNombre() . "';";
            return "Tarea borrada con éxito. ";
        }
    }


    /**
     * Busca tarea por ID_TAREA
     * @param $id
     */
    function buscarTareaId($id){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE ID_TAREA = '" . $id . "';";

        $resultado = $this->mysqli->query($sql);

        if($resultado->num_rows != 0){
            $tarea = $resultado->fetch_array();
            return $tarea;
        }else{
            return "No hay resultados";
        }
    }


    /**
     * Busca tarea por Nombre
     *
     */
    function buscarTareaNombre($nombre){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE NOMBRE = '" . $nombre . "';";

        $resultado = $this->mysqli->query($sql);

        if($resultado->num_rows != 0){
            $tarea = $resultado->fetch_array();
            return $tarea;
        }else{
            return "No hay resultados";
        }
    }





}