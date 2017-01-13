<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 23/12/2016
 * Time: 15:03
 */

    require_once("../Models/MIEMBRO_Model.php");


    class MiembroMapper {

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
         * Devuelve todos los miembros
         * @return array con las instancias de cada miembro; si se produce algún error o no hay datos en la tabla
         */

        public function consultarMiembros() {

            $sql = "SELECT * FROM empleados";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> num_rows == 0) return false;

            $miembros = array();
            while($obj = $resultado -> fetch_object()){

                $user = $obj -> emp_user;
                $password = $obj -> emp_password;
                $nombre = $obj -> emp_nombre;
                $apellido = $obj -> emp_apellido;
                $email = $obj -> emp_email;

                $miembro = new Miembro($nombre, $apellido, $user, $password, $email);

                array_push($miembros, $miembro);
            }

            return $miembros;
        }

        /**
         * Busca el miembro que tenga el usuario pasado por parámetro
         * @param $user
         * @return false si se produce algún error o no se encuentra; o se devuelve el Miembro, en caso contrario
         */
        public function buscarMiembroPorUsuario($user) {
            $this->ConectarBD();
            $sql = "SELECT * FROM EMPLEADOS where EMP_USER = '{$user}' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado->num_rows == 0) return false;

            $miembro = $resultado->fetch_array(MYSQLI_ASSOC);

            $miembro = new Miembro($miembro["EMP_NOMBRE"], $miembro["EMP_APELLIDO"], $miembro["EMP_USER"], $miembro["EMP_PASSWORD"], $miembro["EMP_EMAIL"]);

            return $miembro;
        }

        /**
         * Inserta un miembro en la base de datos
         * @param Miembro $miembro
         */
        public function insertarMiembro(Miembro $miembro) {

            $sql = "INSERT INTO `EMPLEADOS` (`EMP_USER`, `EMP_PASSWORD`, `EMP_NOMBRE`, `EMP_APELLIDO`, `EMP_EMAIL`, `EMP_TIPO`, `EMP_ESTADO`)
                                  VALUES ('{$miembro -> getUsuario()}', '{$miembro -> getContraseña()}', '{$miembro -> getNombre()}', '{$miembro -> getApellidos()}',
                                          '{$miembro -> getCorreo()}', '1', 'Activo')";
            $this -> mysqli ->query($sql);
            $this -> mysqli->close();
        }


        /**
         * Actualiza un miembro en la BBDD
         * @param Miembro $miembro, el miembro con los nuevos datos | $user usuario viejo
         */
        public function updateMiembro($miembro, $user) {

            $sql = "UPDATE `EMPLEADOS` SET `EMP_USER` = '{$miembro -> getUsuario()}', `EMP_PASSWORD` = '{$miembro -> getContraseña()}',`EMP_NOMBRE` = '{$miembro -> getNombre()}',`EMP_APELLIDO` = '{$miembro -> getApellidos()}',
            `EMP_EMAIL` = '{$miembro -> getCorreo()}' WHERE EMP_USER = '$user' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli-> close();
        }


        /**
         * Cambia el estado de un miembro a inactivo en la BBDD
         * @param Miembro $miembro
         */
        public function desactivarMiembro($user) {

            $sql = "UPDATE `EMPLEADOS` SET `EMP_ESTADO` = 'Inactivo' WHERE EMP_USER = '$user' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }

        /**
         * Cambia el estado de un miembro a activo en la BBDD
         * @param Miembro $miembro
         */
        public function activarMiembro($user) {

            $sql = "UPDATE `EMPLEADOS` SET `EMP_ESTADO` = 'Activo' WHERE EMP_USER = '$user' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }


        /**
         * Elimina un miembro de la BBDD
         * @param Miembro $miembro
         */
       /* public function eliminarMiembro(Miembro $miembro) {
            $user = $miembro -> getUsuario();
            $sql = "DELETE from miembro WHERE EMP_USER = '$user' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }*/


        /**
         * @param $id
         * @return Instancia del miembro buscado; si se produce algún error o no existe el parámetro devuelve false
         */
        /*public function buscarMiembroPorId($id) {

            $sql = "SELECT * FROM empleados where empleados_id == '$id' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $obj = $resultado->fetch_object();

            $miembro = new Miembro($obj -> empleados_id, $obj ->  empleados_dni, $obj -> empleados_nombre, $obj -> empleados_apellidos, $obj -> empleados_direccion,
                $obj -> empleados_correo, $obj -> empleados_fech_nac, $obj -> empleados_telefono, $obj -> empleados_profesion, $obj -> empleados_comentarios,
                $obj -> empleados_estado);

            return $miembro;
        }*/

        /*Busca y lista todos los miembros de un proyecto*/
        public function listarMiembrosProyecto($id_proyecto)
        {
            $this->ConectarBD();
            $sql = "SELECT * FROM PROYECTO_MIEMBRO P,EMPLEADOS E where E.EMP_USER = P.EMP_USER AND ID_PROYECTO = {$id_proyecto} AND E.EMP_ESTADO ='activo'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return false;
            } else {
                $miembros_proyecto = array();
                while($miembro = $resultado->fetch_array(MYSQLI_ASSOC)){
                    $miembro = new Miembro($miembro["EMP_NOMBRE"], $miembro["EMP_APELLIDO"], $miembro["EMP_USER"], $miembro["EMP_PASSWORD"], $miembro["EMP_EMAIL"]);
                    array_push($miembros_proyecto, $miembro);
                }

                return $miembros_proyecto;

            }
        }
    }

?>
