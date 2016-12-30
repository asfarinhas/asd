<?php
include '../Models/CORREO_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
include '../Mappers/CORREO_Mapper.php';
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

$correoMapper=new CorreoMapper();
function get_data_form(){
//Recoge la información del formulario

    if(isset($_REQUEST['ID_CORREO'])){
        $ID_CORREO = $_REQUEST['ID_CORREO'];
    }else{
          $ID_CORREO=str_shuffle("abcdefghijklmnop0123456789".uniqid());
    }

    if(isset($_REQUEST['ASUNTO'])){
        $ASUNTO = $_REQUEST['ASUNTO'];
    }else{
          $ASUNTO=NULL;
    }

    $EMISOR=$_SESSION['login']->getCorreo();



    if(isset($_REQUEST['RECEPTOR'])){
        $RECEPTOR = $_REQUEST['RECEPTOR'];
    }else{
          $RECEPTOR=NULL;
    }

    if(isset($_REQUEST['FECHAENVIO'])){
        $FECHAENVIO=$_REQUEST['FECHAENVIO'];
    }else{
        $FECHAENVIO= date('Y-m-d H:i:s');
    }

    if(isset($_REQUEST['CONTENIDO'])){
        $CONTENIDO=$_REQUEST['CONTENIDO'];
    }else{
        $CONTENIDO = null;
    }




    $accion = $_REQUEST['accion'];
    $correo= new Correo ($ID_CORREO,$EMISOR,$RECEPTOR,$ASUNTO,$CONTENIDO,$FECHAENVIO);
    return $correo;
}
if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {
    case $strings['Insertar']: //Enviar un correo
        if (!isset($_REQUEST['RECEPTOR'])) {
            if (!tienePermisos('Correo_add')) {
                new Mensaje('No tienes los permisos necesarios', 'CORREO_Controller.php');
            } else {
                new Correo_Add();
            }
        } else {
            $correo= get_data_form();
            $respuesta = $correoMapper->insertar($correo);
            new Mensaje($respuesta, 'CORREO_Controller.php');


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
                new Notificacion_Enviada($datos, 'NOTIFICACION_Controller.php');

            }
            break;

            case $strings['Ver']: //Consulta en detalle de un correo
                if (!isset($_REQUEST['ID_NOTIFICACION'])) {
                    new Correo_Show('','','');
                } else {
                    $notificacion = get_data_form();
                    $notificacionMapper->marcarLeido($notificacion);
                    $datos = $notificacionMapper->buscarId($_REQUEST['ID_NOTIFICACION']);
                    if (!tienePermisos('Notificacion_Show')) {
                        new Mensaje('No tienes los permisos necesarios', 'NOTIFICACION_Controller.php');
                    } else {
                        new Notificacion_Show('buscar',$datos, 'NOTIFICACION_Controller.php');

                    }
                }
                break;




        default:
        //La vista por defecto lista los correos que se han enviado
        if (!isset($_REQUEST['ID_CORREO'])) {
            $correo = new Correo('', '','','','','');

        } else {
            $correo = get_data_form();
        }
        $datos = $correoMapper->listarEnviadas();
        if (!tienePermisos('Correo_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Correo_Default($datos, '../Views/DEFAULT_Vista.php');
       }
}
?>
