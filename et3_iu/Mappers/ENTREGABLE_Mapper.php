<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 29/12/2016
 * Time: 12:57
 */
    require_once("../Models/ENTREGABLE_Model.php");

    class ENTREGABLE_Mapper{

        private $mysqli;

        public function __construct() {
            $this->mysqli = $this -> ConectarBD();
        }

        //Extraer esta función
        public function ConectarBD()
        {
            $this->mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

            if ($this->mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
            }
        }

        /**
         * Devuelve todos los entregables de la BBDD
         * @return array con las instancias de cada entregable; si se produce algún error o no hay datos en la tabla return false
         */

        public function consultarEntregables() {

            $sql = "SELECT * FROM entregable";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $toret = array();
            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();
            while($obj = $resultado -> fetch_object()){

                $id_entregable = $obj -> id_entregable;
                $nombre = $obj -> nombre;
                $estado = $obj -> estado;
                $url = $obj -> url;
                $id_miembro = $miembro_mapper-> buscarMiembroPorUsuario($obj -> id_miembro);
                $fechasubida = $obj -> fechasubida;
                $id_tarea = $tarea_mapper->buscarTareaId($obj -> id_tarea);

                $aux = new Entregable($id_entregable, $nombre, $estado, $url, $id_miembro, $fechasubida, $id_tarea);

                array_push($toret, $aux);
            }

            return $toret;
        }


        /**
         * Busca el entregable que tenga el id pasado por parámetro
         * @param $id
         * @return false si se produce algún error o no se encuentra; o se devuelve el Entregable, en caso contrario
         */
        public function buscarEntregablePorID($id) {

            $sql = "SELECT * FROM entregable where id_entregable= '%$id%' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();

            $obj = $resultado->fetch_object();
            $toret = new Entregable($obj -> id_entregable, $obj -> nombre, $obj -> estado, $obj -> url, $miembro_mapper-> buscarMiembroPorUsuario($obj -> id_miembro),
                                        $obj -> fechasubida, $tarea_mapper->buscarTareaId($obj -> id_tarea));

            return $toret;
        }

        /**
         * Devuelve los entregables de una tarea
         * @param $id_tarea
         * @return false si se produce algún error o no se encuentra; o se devuelve un array con las instancias de cada Entregable
         */
        public function consultarEntregablesTarea($id_tarea) {

            $sql = "SELECT * FROM entregable where id_tarea = '%$id_tarea%' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();
            $toret = array();

            while($obj = $resultado->fetch_object()){

                $aux = new Entregable($obj -> id_entregable, $obj -> nombre, $obj -> estado, $obj -> url, $miembro_mapper-> buscarMiembroPorUsuario($obj -> id_miembro),
                    $obj -> fechasubida, $tarea_mapper->buscarTareaId($obj -> id_tarea));

                array_push($toret, $aux);
            }

            return $toret;
        }

        /**
         * Devuelve los entregables de un miembro
         * @param $id_miembro
         * @return false si se produce algún error o no se encuentra; o se devuelve un array con las instancias de cada Entregable
         */
        public function consultarEntregablesMiembro($id_miembro) {

            $sql = "SELECT * FROM entregable where id_miembro = '%$id_miembro%' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();
            $toret = array();

            while($obj = $resultado->fetch_object()){

                $aux = new Entregable($obj -> id_entregable, $obj -> nombre, $obj -> estado, $obj -> url, $miembro_mapper-> buscarMiembroPorUsuario($obj -> id_miembro),
                    $obj -> fechasubida, $tarea_mapper->buscarTareaId($obj -> id_tarea));

                array_push($toret, $aux);
            }

            return $toret;
        }

        /**
         * Inserta un entregable en la base de datos
         * @param Entregable $entregable
         */
        public function insertarEntregable(Entregable $entregable) {

            $sql = "INSERT INTO `EMPLEADOS` (`NOMBRE`, `ESTADO`, `URL`, `ID_MIEMBRO`, `FECHASUBIDA`, `ID_TAREA`)
                                               VALUES ('{$entregable -> getNombre()}', '{$entregable -> getEstado()}',
                                                       '{$entregable -> getURL()}', '{$entregable -> getMiembro()->getUsuario()}(', 
                                                       '{$entregable -> getFechaSubida()}', '{$entregable -> getTarea()->getIdTarea()}')";
            $this -> mysqli ->query($sql);
            $this -> mysqli->close();
        }


        /**
         * Actualiza un entregable en la BBDD
         * @param Entregable $entregable, el entregable con los nuevos datos
         */
        public function updateEntregable(Entregable $entregable) {

            $sql = "UPDATE `ENTREGABLE` SET `ID_ENTREGABLE` = '{$entregable -> getID()}', `NOMBRE` = '{$entregable -> getNombre()}', `ESTADO` = '{$entregable -> getEstado()}', 
                                          `URL` = '{$entregable -> getUrl()}', `ID_MIEMBRO` = '{$entregable -> getMiembro()->getUsuario()}', `FECHASUBIDA` = '{$entregable -> getFechaSubida()}', 
                                          `ID_TAREA` = '{$entregable -> getTarea()->getIdTarea()}' WHERE ID_ENTREGABLE = '{$entregable -> getID()}' ";

            $this -> mysqli -> query($sql);
            $this -> mysqli-> close();
        }

        /**
         * Elimina un entregable de la BBDD
         * @param Entregable $entregable
         */
        public function eliminarEntregable(Entregable $entregable) {
            $id = $entregable -> getID();
            $sql = "DELETE FROM entregable WHERE id_entregable = '{$entregable->getID()}' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }
    }
?>