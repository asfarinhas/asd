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
    
    //PROBAR PRIMERO ANTES DE CAMBIAR
    function listarTareasMiembro($idMiembro){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE ID_MIEMBRO = '" . $idMiembro. "' ORDER BY FECHAIP";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $tareas_bd = $resultado->fetch_array(MYSQLI_ASSOC);

            $tareas_model = array();

            foreach ($tareas_bd as $row) {

                 $tareaPadre = new Tarea($row["id_tarea"], $row["nombre"], $row["descripcion"], $row["tarea_padre"],
                     $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                     $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $row["miembro"],
                     $row["estado_tarea"], $row["comentario"]);

                 $miembro = new Miembro($row["DNI"], $row["NOMBRE"], $row["APELLIDOS"], $row["APELLIDOS"],
                     $row["USUARIO"], $row["CONTRASEÑA"], $row["CORREO"]);


                 array_push($tareas_model, new Tarea($row["id_tarea"], $row["nombre"], $row["descripcion"],
                     $tareaPadre, $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                     $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $miembro, $row["estado_tarea"],
                     $row["comentario"]));
            }
            return $tareas_model;
            }
        }


    /**
     * @param Miembro_Model $idMiembro
     * @return array|string; devuelve un array con las instancias de las tareas padre del miembro pasado por parámetro o un string error
     */
    function listarTareasPadreMiembro($idMiembro){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE ID_MIEMBRO = '" . $idMiembro . "' AND PADRE = null ORDER BY FECHAIP";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $tareas_bd = $resultado->fetch_array(MYSQLI_ASSOC);

            $tareas_model = array();

            foreach ($tareas_bd as $row) {

                $miembro = new Miembro_Model($row["NOMBRE"], $row["APELLIDOS"], $row["APELLIDOS"],
                    $row["USUARIO"], $row["CONTRASEÑA"], $row["CORREO"]);


                array_push($tareas_model, new Tarea($row["id_tarea"], $row["nombre"], $row["descripcion"],
                    null, $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                    $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $miembro, $row["estado_tarea"],
                    $row["comentario"]));
            }
            return $tareas_model;
        }
    }

        /**
         *Lista las subtareas con padre X
         */
        function listarSubtareasPadre($padre){
            $this->conectarBD();

            $sql = "SELECT * FROM TAREA,MIEMBRO WHERE TAREA.PADRE = '" . $padre . "' ORDER BY FECHAIP";

            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                $resultado->fetch_array(MYSQLI_ASSOC);

                $tareas_model = array();

                foreach ($tareas_bd as $row) {

                    $tareaPadre = new Tarea($row["id_tarea"], $row["nombre"], $row["descripcion"], $row["tarea_padre"],
                        $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                        $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $row["miembro"],
                        $row["estado_tarea"], $row["comentario"]);

                    $miembro = new Miembro($row["DNI"], $row["NOMBRE"], $row["APELLIDOS"], $row["APELLIDOS"],
                        $row["USUARIO"], $row["CONTRASEÑA"], $row["CORREO"]);


                    array_push($tareas_model, new Tarea($row["id_tarea"], $row["nombre"], $row["descripcion"],
                        $tareaPadre, $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                        $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $miembro,
                        $row["estado_tarea"], $row["comentario"]));
                }
                return $tareas_model;
            }
        }

        /**
         * Lista las tareas de X miembro que estén sin acabar (<100%)
         * @param $idMiembro
         * @return string
         */
        function listarTareasPendientesMiembro($idMiembro)
        {
            $this->conectarBD();
            $sql = "SELECT * FROM TAREA WHERE ID_MIEMBRO = '" . $idMiembro->getUsuario() . "' AND  ESTADO = "pendiente" ORDER BY FECHAIP";

            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                 $tareas_model = array();
                 $miembro_mapper = new MiembroMapper();

                while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

                    $miembro = $miembro_mapper->buscarMiembroPorUsuario($tareas_bd["ID_MIEMBRO"]);

                    if($tareas_bd["PADRE"] != 0){
                        $padre = $this->buscarTareaId($tareas_bd["PADRE"]);
                    }else{
                        $padre = null;
                    }
                
                    //CAMBIAR TODO A MAYUSCULAS
                    $aux= array($row["id_tarea"] => new Tarea($row["id_tarea"],$row["nombre"], $row["descripcion"],
                        $padre, $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                        $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $miembro,
                        $row["estado_tarea"], $row["comentario"]));

                    array_merge($tareas_model, $aux);
                }
                return $tareas_model;
            }
        }


        /**
         *Insertar una tarea
         */
        function insertarTarea(Tarea $tarea)
        {
            $this->conectarBD();
            $sql = "INSERT INTO TAREA (NOMBRE,FECHAIP,FECHAIR,FECHAEP,FECHAER,HORASP,HORASR,ID_MIEMBRO,ID_PROYECTO, DESCRIPCION,ESTADO,COMENTARIO) 
                VALUES ('{$tarea->getNombre()}','{$tarea->getFechaInicioPlan()}','{$tarea->getFechaInicioReal()}','{$tarea->getFechaEntregaPlan()}','{$tarea->getFechaEntregaReal()}','{$tarea->getHorasPlan()}','{$tarea->getHorasReal()}','{$tarea->getMiembro()->getUsuario()}','{$tarea->getProyecto()->getIDPROYECTO()}','{$tarea->getDescripcion()}','{$tarea->getEstadoTarea()}','{$tarea->getComentario()}');";
            if ($this->mysqli->query($sql) === TRUE) {
                return "Creado con éxito";
            } else {
                return "Error en la creación ";
            }
        }


        /**
         * Modificar una tarea
         */
        function modificarTarea(Tarea $tarea)
        {
            $this->conectarBD();

            $sql = "UPDATE TAREA SET PADRE = '" . $tarea->getTareaPadre() . "', ID_TAREA = '" . $tarea->getIdTarea() . "', 
                    NOMBRE = '" . $tarea->getNombre() . "', 
                    FECHAIP = '" . $tarea->getFechaEntregaPlan() . "', 
                    FECHAIR = '" . $tarea->getFechaInicioReal() . "', 
                    FECHAEP = '" . $tarea->getFechaEntregaPlan() . "', 
                    FECHAER = '" . $tarea->getFechaEntregaReal() . "',
                    HORASP = '" . $tarea->getHorasPlan() . "', 
                    HORASR = '" . $tarea->getHorasReal() . "',
                    ID_MIEMBRO = '" . $tarea->getMiembro()->getUsuario() . "', 
                    DESCRIPCION = '" . $tarea->getDescripcion() . "',
                    ESTADO = '" . $tarea->getEstadoTarea() . "', 
                    COMENTARIO = '" . $tarea->getEstadoTarea() . "';";
            if ($this->mysqli->query($sql) === TRUE) {
                return "Modificada con éxito con éxito";
            } else {
                return "Error en la modificación";
            }
        }

        /**
         * Elimina una tarea dada por su nombre y su id
         * @param Tarea $tarea
         */
        function borrarTarea($idTarea)
        {
            $this->conectarBD();

            $sql = "SELECT * FROM TAREA WHERE NOMBRE = '" . $idTarea . "';";
            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos. ';
            } else {
                $sql = "DELETE FROM TAREA WHERE NOMBRE = '" . $idTarea . "';";
                return "Tarea borrada con éxito. ";
            }
        }


        /**
         * Busca tarea por ID_TAREA
         * @param $id
         */
        function buscarTareaId($id)
        {
            $this->conectarBD();

            $sql = "SELECT * FROM TAREA WHERE ID_TAREA = '" . $id . "';";

            $resultado = $this->mysqli->query($sql);

            if ($resultado->num_rows != 0) {
                $tareas_bd = $resultado->fetch_array(MYSQLI_ASSOC);

                $miembro_mapper = new MiembroMapper();

                if($tareas_bd["PADRE"] != 0)
                    $tareaPadre = $this->buscarTareaId($tareas_bd["PADRE"]);
                else
                    $tareaPadre = null;
                $miembro = $miembro_mapper->buscarMiembroPorUsuario($tareas_bd["ID_MIEMBRO"]);

                $tarea = new Tarea($tareas_bd["ID_TAREA"], $tareas_bd["NOMBRE"], $tareas_bd["DESCRIPCION"],
                    $tareaPadre, $tareas_bd["FECHAIP"], $tareas_bd["FECHAEP"], $tareas_bd["FECHAIR"],
                    $tareas_bd["FECHAER"], $tareas_bd["HORASP"], $tareas_bd["HORASR"], $miembro,
                    $tareas_bd["ESTADO"], $tareas_bd["COMENTARIO"]);

                return $tarea;
            } else {
                return "No hay resultados";
            }
        }


        /**
         * Busca tarea por Nombre
         *
         */
        function listarTareas(){
            $this->conectarBD();

            $sql = "SELECT * FROM TAREA;";

            $resultado = $this->mysqli->query($sql);

            if ($resultado->num_rows != 0) {
                
                $tareas_model = array();
                $miembro_mapper = new MiembroMapper();

                while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

                    $miembro = $miembro_mapper->buscarMiembroPorUsuario($tareas_bd["ID_MIEMBRO"]);

                    //CAMBIAR TODO A MAYUSCULAS, TIENE QUE SER COMO EN LA BD
                    $aux= array($row["ID_TAREA"] => new Tarea($row["ID_TAREA"],$row["NOMBRE"], $row["DESCRIPCION"],
                        new Tarea($row["PADRE"]), $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["FECHA"],
                        $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $miembro,
                        $row["estado_tarea"], $row["comentario"]));

                    array_merge($tareas_model, $aux);
                }

                foreach ($tareas_model as $tarea){
                    if($tarea->getTareaPadre()->getIdTarea() != 0) {
                        $tarea->setPadre($tareas_model[$tarea->getTareaPadre()->getIdTarea()]);
                    }else{
                        $tarea->setPadre(null);
                    }
                }

                return $tareas_model;
            } else {
                return "No hay resultados";
            }
        }

    function listarTareasNombre($nombre){
        $this->conectarBD();

        $sql = "SELECT * FROM TAREA WHERE NOMBRE = {$nombre};";

        $resultado = $this->mysqli->query($sql);

        if ($resultado->num_rows != 0) {
            
            $tareas_model = array();
            $miembro_mapper = new MiembroMapper();

             while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

                $miembro = $miembro_mapper->buscarMiembroPorUsuario($tareas_bd["ID_MIEMBRO"]);

                if($tareas_bd["PADRE"] != 0){
                    $padre = $this->buscarTareaId($tareas_bd["PADRE"]);
                }else{
                    $padre = null;
                }
                
                //CAMBIAR TODO A MAYUSCULAS
                $aux= array($row["id_tarea"] => new Tarea($row["id_tarea"],$row["nombre"], $row["descripcion"],
                    $padre, $row["fecha_inicio_plan"], $row["fecha_entrega_plan"], $row["fecha_inicio_real"],
                    $row["fecha_entrega_real"], $row["horas_plan"], $row["horas_real"], $miembro,
                    $row["estado_tarea"], $row["comentario"]));

                array_merge($tareas_model, $aux);
            }



            return $tareas_model;
        } else {
            return "No hay resultados";
        }
    }
}
