<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 29/12/2016
 * Time: 12:57
 */
    require_once("../Models/ENTREGABLE_Model.php");
    require_once("../Mappers/MIEMBRO_Mapper.php");
    require_once("../Mappers/TAREA_Mapper.php");

    class ENTREGABLE_Mapper{

        private $mysqli;

        public function __construct() {
            $this -> ConectarBD();
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
            $this->ConectarBD();
            $sql = "SELECT * FROM entregable";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> num_rows == 0) return false;

            $toret = array();
            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();
            while($obj = $resultado -> fetch_object()){

                $aux = new Entregable($obj -> ID_ENTREGABLE, $obj -> NOMBRE, $obj -> ESTADO, $obj -> URL, $miembro_mapper-> buscarMiembroPorUsuario($obj -> ID_MIEMBRO),
                    new DateTime( $obj -> FECHASUBIDA ), $tarea_mapper->buscarTareaId($obj -> ID_TAREA));

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

            $sql = "SELECT * FROM ENTREGABLE where ID_ENTREGABLE = '{$id}' ";
            $resultado = $this -> mysqli -> query($sql);
            if($resultado == false)return false;

            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();

            $obj = $resultado->fetch_object();
            $toret = new Entregable($obj -> ID_ENTREGABLE, $obj -> NOMBRE, $obj -> ESTADO, $obj -> URL,
                $miembro_mapper-> buscarMiembroPorUsuario($obj -> ID_MIEMBRO),
                                        new DateTime( $obj -> FECHASUBIDA), $tarea_mapper->buscarTareaId($obj -> ID_TAREA));

            return $toret;
        }

        /**
         * Devuelve los entregables de una tarea
         * @param $id_tarea
         * @return false si se produce algún error o no se encuentra; o se devuelve un array con las instancias de cada Entregable
         */
        public function consultarEntregablesTarea($id_tarea) {
            $this->ConectarBD();
            $sql = "SELECT * FROM ENTREGABLE where ID_TAREA = '{$id_tarea}' ";

            $resultado = $this -> mysqli -> query($sql);

            $toret = array();
            if($resultado != false ) {

                $miembro_mapper = new MiembroMapper();
                $tarea_mapper = new TAREA_Mapper();

                while ($obj = $resultado->fetch_object()) {

                    $aux = new Entregable($obj->ID_ENTREGABLE, $obj->NOMBRE, $obj->ESTADO, $obj->URL, $miembro_mapper->buscarMiembroPorUsuario($obj->ID_MIEMBRO),
                        new DateTime($obj->FECHASUBIDA), $tarea_mapper->buscarTareaId($obj->ID_TAREA));

                    array_push($toret, $aux);
                }
            }
            return $toret;
        }

        /**
         * Devuelve los entregables de un miembro
         * @param $id_miembro
         * @return false si se produce algún error o no se encuentra; o se devuelve un array con las instancias de cada Entregable
         */
        public function consultarEntregablesMiembro($id_miembro) {
            $this->ConectarBD();
            $sql = "SELECT * FROM entregable where ID_MIEMBRO = '{$id_miembro}' ";
            echo $sql;
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> num_rows == 0) return false;

            $miembro_mapper = new MiembroMapper();
            $tarea_mapper = new TAREA_Mapper();
            $toret = array();

            while($obj = $resultado->fetch_object()){

                $aux =new Entregable($obj -> ID_ENTREGABLE, $obj -> NOMBRE, $obj -> ESTADO, $obj -> URL, $miembro_mapper-> buscarMiembroPorUsuario($obj -> ID_MIEMBRO),
                    new DateTime( $obj -> FECHASUBIDA), $tarea_mapper->buscarTareaId($obj -> ID_TAREA));

                array_push($toret, $aux);
            }

            return $toret;
        }

        /**
         * Inserta un entregable en la base de datos
         * @param Entregable $entregable
         */
        public function insertarEntregable(Entregable $entregable) {
            $this->ConectarBD();
            $sql = "INSERT INTO `ENTREGABLE` (`NOMBRE`, `ESTADO`, `URL`, `ID_MIEMBRO`, `FECHASUBIDA`, `ID_TAREA`)
                                               VALUES ('{$entregable -> getNombre()}', '{$entregable -> getEstado()}',
                                                       '{$entregable -> getURL()}', '{$entregable -> getMiembro()->getUsuario()}', 
                                                       '{$entregable -> getFecha()->format("Y-m-d H:i:s")}', '{$entregable -> getTarea()->getIdTarea()}')";
            $res = $this -> mysqli -> query($sql);
            $this -> mysqli-> close();
            return "Creado con éxito";
        }


        /**
         * Actualiza un entregable en la BBDD
         * @param Entregable $entregable, el entregable con los nuevos datos
         */
        public function updateEntregable(Entregable $entregable) {
            $this->ConectarBD();
            $sql = "UPDATE `ENTREGABLE` SET `ID_ENTREGABLE` = '{$entregable -> getID()}', `NOMBRE` = '{$entregable -> getNombre()}', `ESTADO` = '{$entregable -> getEstado()}', 
                                          `URL` = '{$entregable -> getUrl()}', `ID_MIEMBRO` = '{$entregable -> getMiembro()->getUsuario()}', `FECHASUBIDA` = '{$entregable -> getFechaSubida()->format("Y-m-d H:i:s")}',
                                          `ID_TAREA` = '{$entregable -> getTarea()->getIdTarea()}' WHERE ID_ENTREGABLE = '{$entregable -> getID()}' ";
            $res = $this -> mysqli -> query($sql);
            $this -> mysqli-> close();
            return $res;
        }

        /**
         * Elimina un entregable de la BBDD
         * @param Entregable $entregable
         */
        public function eliminarEntregable(Entregable $entregable) {
            $this->ConectarBD();
            $sql = "DELETE FROM entregable WHERE id_entregable = '{$entregable->getID()}' ";
            $res = $this -> mysqli -> query($sql);
            $this -> mysqli-> close();
            return $res;
        }
    }
?>