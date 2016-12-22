<?php

include '../Models/PROYECTO_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
require_once("../Mappers/PROYECTO_Mapper.php");
include '../Views/MENSAJE_Vista.php';
if (!IsAuthenticated()){
    header('Location:../index.php');
}
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

function get_data_form(){

//Recoge la información del formulario
    if(isset($_REQUEST['ID_PROYECTO'])){
        $ID_PROYECTO=$_REQUEST['ID_PROYECTO'];
    }else{
        $ID_PROYECTO = null;
    }

    if(isset($_REQUEST['PROYECTO_NOMBRE'])){
        $PROYECTO_NOMBRE=$_REQUEST['PROYECTO_NOMBRE'];
    }else{
        $PROYECTO_NOMBRE = null;
    }

    if(isset($_REQUEST['PROYECTO_DESCRIPCION'])){
        $PROYECTO_DESCRIPCION=$_REQUEST['PROYECTO_DESCRIPCION'];
    }else{
        $PROYECTO_DESCRIPCION = null;
    }

    if(isset($_REQUEST['PROYECTO_FECHAI'])){
        $PROYECTO_FECHAI=$_REQUEST['PROYECTO_FECHAI'];
    }else{
        $PROYECTO_FECHAI = null;
    }

    if(isset($_REQUEST['PROYECTO_FECHAIP'])){
        $PROYECTO_FECHAIP=$_REQUEST['PROYECTO_FECHAIP'];
    }else{
        $PROYECTO_FECHAIP = null;
    }

    if(isset($_REQUEST['PROYECTO_FECHAE'])){
        $PROYECTO_FECHAE=$_REQUEST['PROYECTO_FECHAE'];
    }else{
        $PROYECTO_FECHAE = null;
    }

    if(isset($_REQUEST['PROYECTO_FECHAFP'])){
        $PROYECTO_FECHAFP=$_REQUEST['PROYECTO_FECHAFP'];
    }else{
        $PROYECTO_FECHAFP = null;
    }

    if(isset($_REQUEST['PROYECTO_NUMEROMIEMBROS'])){
        $PROYECTO_NUMEROMIEMBROS=$_REQUEST['PROYECTO_NUMEROMIEMBROS'];
    }else{
        $PROYECTO_NUMEROMIEMBROS = null;
    }

    if(isset($_REQUEST['PROYECTO_NUMEROHORAS'])){
        $PROYECTO_NUMEROHORAS=$_REQUEST['PROYECTO_NUMEROHORAS'];
    }else{
        $PROYECTO_NUMEROHORAS = null;
    }

    if(isset($_REQUEST['PROYECTO_DIRECTOR'])){
        $PROYECTO_DIRECTOR=$_REQUEST['PROYECTO_DIRECTOR'];
    }else{
        $PROYECTO_DIRECTOR = null;
    }

    $accion = $_REQUEST['accion'];

    $proyecto = new Proyecto($ID_PROYECTO,$PROYECTO_NOMBRE,$PROYECTO_DESCRIPCION,$PROYECTO_FECHAI,$PROYECTO_FECHAIP,$PROYECTO_FECHAE,$PROYECTO_FECHAFP,$PROYECTO_NUMEROMIEMBROS,$PROYECTO_NUMEROHORAS,$PROYECTO_DIRECTOR);

    return $proyecto;
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {
    case $strings['Insertar']: //Inserción de proyecto
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            if (!tienePermisos('FUNCIONALIDAD_Show')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {
                new Proyecto_Add();
            }
        } else {

            $proyecto= get_data_form();
            $respuesta = $proyecto->insertar();
            new Mensaje($respuesta, 'PROYECTO_Controller.php');

        }
        break;
    case $strings['Borrar']: //Borrado de proyecto
        if (!isset($_REQUEST['ID_PROYECTO'])) {
            $proyecto = new Proyecto('', $_REQUEST['PROYECTO_NOMBRE'],$_REQUEST['PROYECTO_DESCRIPCION'],$_REQUEST['PROYECTO_FECHAI'],$_REQUEST['PROYECTO_FECHAIP'],$_REQUEST['PROYECTO_FECHAE'],$_REQUEST['PROYECTO_FECHAFP'],$_REQUEST['PROYECTO_NUMEROMIEMBROS'],$_REQUEST['PROYECTO_NUMEROHORAS'],$_REQUEST['PROYECTO_DIRECTOR']);
            $valores = $proyecto->RellenaDatos($proyecto->getNOMBRE());
            if (!tienePermisos('Proyecto_Delete')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {
                new Proyecto_Delete($valores, 'PROYECTO_Controller.php');
            }
        } else {


            $proyecto = get_data_form();
            $respuesta = $proyecto->delete_proyecto();
            new Mensaje($respuesta, 'PROYECTO_Controller.php');
        }
        break;
    case $strings['Modificar']: //Modificación de proyecto

        if (!isset($_REQUEST['ID_PROYECTO'])) {

            $proyecto = new Proyecto('', $_REQUEST['PROYECTO_NOMBRE'],$_REQUEST['PROYECTO_DESCRIPCION'],$_REQUEST['PROYECTO_FECHAI'],$_REQUEST['PROYECTO_FECHAIP'],$_REQUEST['PROYECTO_FECHAE'],$_REQUEST['PROYECTO_FECHAFP'],$_REQUEST['PROYECTO_NUMEROMIEMBROS'],$_REQUEST['PROYECTO_NUMEROHORAS'],$_REQUEST['PROYECTO_DIRECTOR']);
            $valores = $proyecto->RellenaDatos();

            if (!tienePermisos('Proyecto_Delete')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {

                new Proyecto_Edit($valores, 'PROYECTO_Controller.php');
            }
        } else {

            $proyecto = get_data_form();

            $respuesta = $proyecto->update_proyecto($_REQUEST['ID_PROYECTO']);
            new Mensaje($respuesta, 'PROYECTO_Controller.php');

        }
        break;
    case $strings['Consultar']: //Consulta de proyecto
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            new Proyecto_Show();
        } else {
            $proyecto = get_data_form();
            $datos = $proyecto->select_proyecto();
            if (!tienePermisos('Proyecto_Delete')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {

                new Proyecto_default($datos, 'PROYECTO_Controller.php');
            }
        }
        break;

    default:
        //La vista por defecto lista todas los proyectos
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            $proyecto = new Proyecto('', '','','','','','','','','');
        } else {
            $proyecto = get_data_form();
        }
        $proyectoMapper = new ProyectoMapper();
        $datos = $proyectoMapper->listar();
        if (!tienePermisos('Pagina_default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Proyecto_Default($datos, '../Views/DEFAULT_Vista.php');

        }

}

?>