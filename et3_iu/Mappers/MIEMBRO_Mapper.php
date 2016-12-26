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
         * Devuelve todos los miembros
         * @return array con las instancias de cada miembro; si se produce algún error o no hay datos en la tabla
         */

        public function consultarMiembros() {

            $sql = "SELECT * FROM empleados";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $miembros = array();
            while($obj = $resultado -> fetch_object()){
                //$id = $obj -> empleados_id;
                $user = $obj -> empleados_user;
                $password = $obj -> empleados_password;

                $nombre = $obj -> empleados_nombre;
                $apellido = $obj -> empleados_apellido;
                $dni = $obj ->  empleados_dni;
                $fecha = $obj -> empleados_fech_nac;
                $email = $obj -> empleados_email;
                $telefono = $obj -> empleados_telefono;
                $cuenta = $obj -> empleados_cuenta;
                $direccion = $obj -> empleados_direccion;
                $comentario = $obj -> empleados_comentarios;
                $tipo = $obj -> empleados_tipo;
                $estado = $obj -> empleados_estado;
                $foto = $obj -> empleados_foto;
                $nomina = $obj -> empleados_nomina;

                //$profesion = $obj -> empleados_profesion;
                //$apellido1 = $obj -> apellido1;
                //$apellido2 = $obj -> apellido2;


                $miembro = new Miembro($user,$password, $nombre, $apellido, $dni, $fecha, $email, $telefono, $cuenta, $direccion, $comentario, $tipo, $estado, $foto, $nomina);

                array_push($miembros, $miembro);
            }

            return $miembros;
        }


        /**
         * Busca el miembro que tenga el dni pasado por parámetro
         * @param $dni
         * @return false si se produce algún error o no se encuentra o se devuelve el Miembro, en caso contrario
         */
        public function buscarMiembroPorDNI($dni) {

            $sql = "SELECT * FROM empleados where empleados_dni LIKE '%$dni%' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $obj = $resultado->fetch_object();

            $miembro = new Miembro($obj -> empleados_user, $obj -> empleados_password, $obj -> empleados_nombre, $obj -> empleados_apellido, $obj -> empleado_dni,
                $obj -> empleados_fech_nac, $obj -> empleados_email, $obj -> empleados_telefono, $obj -> empleados_cuenta, $obj -> empleados_direccion,
                $obj -> empleados_comentarios, $obj -> empleados_tipo, $obj -> empleados_estado, $obj -> empleados_foto, $obj -> empleados_nomina);

            return $miembro;
        }

        /**
         * Busca el miembro que tenga el usuario pasado por parámetro
         * @param $user
         * @return false si se produce algún error o no se encuentra o se devuelve el Miembro, en caso contrario
         */
        public function buscarMiembroPorUsuario($user) {

            $sql = "SELECT * FROM empleados where empleados_user LIKE '%$user%' ";
            $resultado = $this -> mysqli -> query($sql);

            if($resultado == false || $resultado -> numrows == 0) return false;

            $obj = $resultado->fetch_object();

            $miembro = new Miembro($obj -> empleados_user, $obj -> empleados_password, $obj -> empleados_nombre, $obj -> empleados_apellido, $obj -> empleado_dni,
                $obj -> empleados_fech_nac, $obj -> empleados_email, $obj -> empleados_telefono, $obj -> empleados_cuenta, $obj -> empleados_direccion,
                $obj -> empleados_comentarios, $obj -> empleados_tipo, $obj -> empleados_estado, $obj -> empleados_foto, $obj -> empleados_nomina);

            return $miembro;
        }

        /**
         * Inserta un miembro en la base de datos
         * @param Miembro $miembro
         */
        public function insertarMiembro(Miembro $miembro) {

            $sql = "INSERT INTO `EMPLEADOS` (`EMP_USER`, `EMP_PASSWORD`, `EMP_NOMBRE`, `EMP_APELLIDO`, `EMP_DNI`, `EMP_FECH_NAC`, `EMP_EMAIL`, `EMP_TELEFONO`, 
                                              `EMP_CUENTA`, `EMP_DIRECCION`, `EMP_COMENTARIOS`, `EMP_TIPO`, `EMP_ESTADO`, `EMP_FOTO`, `EMP_NOMINA`)
                                               VALUES ('$miembro -> getUser()', '$miembro -> getPassword()', '$miembro -> getNombre()', '$miembro -> getApellidos()',
                                                      '$miembro -> getDNI()', '$miembro -> getFechaNacimiento()', '$miembro -> getEmail()', '$miembro -> getTelefono()',
                                                       '$miembro -> getCuenta()', '$miembro -> getDireccion()', '$miembro -> getComentarios()', '$miembro -> getTipo()', 
                                                       '$miembro -> getEstado()', '$miembro -> getFoto()', '$miembro -> getNomina()')";
            $this -> mysqli ->query($sql);
            $this -> mysqli->close();
        }


        /**
         * Actualiza un miembro en la BBDD
         * @param Miembro $miembro, el miembro con los nuevos datos, el usuario permanece constante (clave primaria)
         */
        public function updateMiembro(Miembro $miembro) {

            $sql = "UPDATE `EMPLEADOS` SET `EMP_PASSWORD` = '$miembro -> getPassword()',`EMP_NOMBRE` = '$miembro -> getNombre()',`EMP_APELLIDO` = '$miembro -> getApellidos()',
            `EMP_DNI` = '$miembro -> getDNI()',`EMP_FECH_NAC` = '$miembro -> getFechaNacimiento()',`EMP_EMAIL` = '$miembro -> getEmail()',`EMP_TELEFONO` = '$miembro -> getTelefono',
            `EMP_CUENTA` = '$miembro -> getCuenta()', `EMP_DIRECCION` = '$miembro -> getDireccion()',`EMP_COMENTARIOS`='$miembro -> getComentarios()', `EMP_TIPO` = '$miembro -> getTipo()',
            `EMP_ESTADO` = '$miembro -> getEstado()',`EMP_FOTO` = '$miembro -> getFoto()', `EMP_NOMINA` = '$miembro -> getNomina()' WHERE EMP_USER = '$miembro -> getUser()' ";

            $this -> mysqli -> query($sql);
            $this -> mysqli-> close();
        }


        /**
         * Cambia el estado de un miembro a inactivo en la BBDD
         * @param Miembro $miembro
         */
        public function desactivaMiembro(Miembro $miembro) {

            $sql = "UPDATE `EMPLEADOS` SET `EMP_ESTADO` = 'Inactivo' WHERE EMP_USER = '$miembro -> getUser()' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }

        /**
         * Cambia el estado de un miembro a activo en la BBDD
         * @param Miembro $miembro
         */
        public function activaMiembro(Miembro $miembro) {

            $sql = "UPDATE `EMPLEADOS` SET `EMP_ESTADO` = 'Activo' WHERE EMP_USER = '$miembro -> getUser()' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }


        /**
         * Elimina un miembro de la BBDD
         * @param Miembro $miembro
         */
        public function eliminarMiembro(Miembro $miembro) {
            $user = $miembro -> getUser();
            $sql = "DELETE from miembro WHERE id = '$user' ";
            $this -> mysqli -> query($sql);
            $this -> mysqli->close();
        }


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

        /**
         * @param $busqueda
         * @return Instancia del miembro buscado; si se produce algún error o no existe el parámetro devuelve false
         */
        /* public function buscarMiembro($busqueda) {

             $sql = "SELECT * FROM miembro where usuario LIKE '%busqueda%' OR nombre LIKE '%busqueda%' OR apellido1 LIKE '%busqueda%' ";
             $resultado = $this -> mysqli -> query($sql);

             if($resultado == false || $resultado -> numrows == 0) return false;

             $miembros = array();
             while($obj = $resultado -> fetch_object()){
                 $dni = $obj -> dni;
                 $nombre = $obj -> nombre;
                 $apellido1 = $obj -> apellido1;
                 $apellido2 = $obj -> apellido2;
                 $usuario = $obj -> usuario;
                 $contraseña = $obj -> contraseña;
                 $correo = $obj -> correo;

                 $miembro = new Miembro($dni, $nombre, $apellido1, $apellido2, $usuario, $contraseña, $correo);

                 array_push($miembros, $miembro);
             }

             return $miembros;
         }*/
    }

?>