<?php
include '../Models/NOTIFICACION_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
require_once("../Mappers/NOTIFICACION_Mapper.php");
include '../Views/MENSAJE_Vista.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
//Genera los includes según las páginas a las que tiene acceso
$pags=generarIncludes();
for ($z=0;$z<count($pags);$z++){
    include $pags[$z];
}
function get_data_form(){
//Recoge la información del formulario


    $ID_NOTIFICACION=

    $EMISOR=$_SESSION['user'];

    if(isset($_REQUEST['RECEPTOR'])){
        $RECEPTOR=$_REQUEST['RECEPTOR'];
    }else{
        $RECEPTOR = null;
    }
    if(isset($_REQUEST['CONTENIDO'])){
        $CONTENIDO=$_REQUEST['CONTENIDO'];
    }else{
        $CONTENIDO = null;
    }
    $FECHAENVIO=getdate();

    if(isset($_REQUEST['FECHALECTURA'])){
        $FECHALECTURA=$_REQUEST['FECHALECTURA'];
    }else{
        $FECHALECTURA = null;
    }

    $accion = $_REQUEST['accion'];
    $notificacion = new Notificacion ('',$EMISOR,$RECEPTOR,$CONTENIDO,$FECHAENVIO,$FECHALECTURA);
    return $notificacion;
}
if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {
    case $strings['Insertar']: //Crear una nueva notificacion
        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            if (!tienePermisos('Notificacion_add')) {
                new Mensaje('No tienes los permisos necesarios', 'NOTIFICACION_Controller.php');
            } else {
                new Notificacion_Add();
            }
        } else {
            $notificacion= get_data_form();
            $respuesta = $notificacionMappper->insertar($notifiacion);
            new Mensaje($respuesta, 'NOTIFICACION_Controller.php');


        }
        break;
    case $strings['Borrar']: //Borrado de notificacion
        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            $notifiacion = get_data_form();
            $valores = $notificacionMapper->RellenaDatos($notificacion->getID());
            if (!tienePermisos('Notificacion_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', 'NOTIFICACION_Controller.php');
            } else {
                new Proyecto_Borrar($valores, 'NOTIFICACION_Controller.php');
            }
        } else {


            $notificacion = get_data_form();
            $respuesta = $notificacionMapper->borrar($notificacion);
            new Mensaje($respuesta, 'NOTIFICACION_Controller.php');
        }
        break;


    case $strings['ConsultarRecibidas']: //Consulta de notificaciones recibidas

        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            $notificacion = new Notificacion('', '','','','','',null);
        } else {
            $notificacion= get_data_form();
        }
        $datos = $notificacionMapper->listarRecibidas();
        if (!tienePermisos('Notificacion_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Notificacion_Default($datos, 'NOTIFICACION_Controller.php');

        }
        break;

        case $strings['ConsultarEnviadas']: //Consulta de notificaciones enviadas
            if (!isset($_REQUEST['ID_NOTIFICACION'])) {
                $notificacion = new Notificacion('', '','','','','',null);
            } else {
                $notificacion= get_data_form();
            }
            $datos = $notificacionMapper->listarEnviadas();
            if (!tienePermisos('Notificacion_Default')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
            } else {
                new Notificacion_Default($datos, 'NOTIFICACION_Controller.php');

            }
            break;
        default:
        //La vista por defecto lista todas los proyectos
        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            $notificacion = new Notificacion('', '','','','','');
        } else {
            $notificacion = get_data_form();
        }
        $datos = $notificacionMapper->listar();
        if (!tienePermisos('Notificacion_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Notificacion_Default($datos, '../Views/DEFAULT_Vista.php');
       }
}
?>
