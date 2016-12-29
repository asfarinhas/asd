<?php
include '../Models/NOTIFICACION_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
include '../Mappers/NOTIFICACION_Mapper.php';
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

$notificacionMapper=new NotificacionMapper();
function get_data_form(){
//Recoge la información del formulario
    if(isset($_REQUEST['ID_NOTIFICACION'])){
        $ID_NOTIFICACION = $_REQUEST['ID_NOTIFICACION'];
    }else{
          $ID_NOTIFICACION=str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());
    }
    if(isset($_REQUEST['EMISOR'])){
        $EMISOR =$_REQUEST['EMISOR'];
    }else{
        $EMISOR  = $_SESSION['login'];
    }
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
    if(isset($_REQUEST['FECHAENVIO'])){
        $FECHAENVIO=$_REQUEST['FECHAENVIO'];
    }else{
        $FECHAENVIO= date('Y-m-d H:i:s');
    }

    $FECHALECTURA = NULL;
    $accion = $_REQUEST['accion'];
    $notificacion = new Notificacion ($ID_NOTIFICACION,$EMISOR,$RECEPTOR,$CONTENIDO,$FECHAENVIO,$FECHALECTURA);
    return $notificacion;
}
if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {
    case $strings['Insertar']: //Crear una nueva notificacion
        if (!isset($_REQUEST['RECEPTOR'])) {
            if (!tienePermisos('Notificacion_add')) {
                new Mensaje('No tienes los permisos necesarios', 'NOTIFICACION_Controller.php');
            } else {
                new Notificacion_Add();
            }
        } else {
            $notificacion= get_data_form();
            $respuesta = $notificacionMapper->insertar($notificacion);
            new Mensaje($respuesta, 'NOTIFICACION_Controller.php');


        }
        break;
    case $strings['Borrar']: //Borrado de notificacion
        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            $notificacion = get_data_form();
            $valores = $notificacionMapper->RellenaDatos($notificacion->getId());
            if (!tienePermisos('Notificacion_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', 'NOTIFICACION_Controller.php');
            } else {
                new Notificacion_Borrar($valores, 'NOTIFICACION_Controller.php');
            }
        } else {


            $notificacion = get_data_form();
            $respuesta = $notificacionMapper->borrar($notificacion);
            new Mensaje($respuesta, 'NOTIFICACION_Controller.php');
        }
        break;


    case $strings['ConsultarRecibidas']: //Consulta de notificaciones recibidas

        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            $notificacion = new Notificacion('', '','','','','');
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
                $notificacion = new Notificacion('', '','','','','');
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

            case $strings['Ver']: //Consulta en detalle de una notifiacion
                if (!isset($_REQUEST['ID_NOTIFICACION'])) {
                    new Proyecto_Show('','','');
                } else {
                    $notificacion = get_data_form();
                    $datos = $notificacionMapper->buscarNombre($_REQUEST['ID_NOTIFICACION']);
                    if (!tienePermisos('Notificacion_Show')) {
                        new Mensaje('No tienes los permisos necesarios', 'NOTIFICACION_Controller.php');
                    } else {

                        new Notificacion_Show('buscar',$datos, 'NOTIFICACION_Controller.php');
                    }
                }
                break;

        default:
        //La vista por defecto lista las notificaciones que estan sin leer
        if (!isset($_REQUEST['ID_NOTIFICACION'])) {
            $notificacion = new Notificacion('', '','','','','');

        } else {
            $notificacion = get_data_form();
        }
        $datos = $notificacionMapper->buscarNoLeidas();
        if (!tienePermisos('Notificacion_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Notificacion_Default($datos, '../Views/DEFAULT_Vista.php');
       }
}
?>
