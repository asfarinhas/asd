<?php
include '../Models/CORREO_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
include '../Mappers/CORREO_Mapper.php';
include '../Views/MENSAJE_Vista.php';
include '../PHPMailer/class.phpmailer.php';





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
    $correoArray = array();

    if(isset($_REQUEST['ASUNTO'])){
        $ASUNTO = $_REQUEST['ASUNTO'];
    }else{
          $ASUNTO=NULL;
    }

    $EMISOR=$_SESSION['login'];

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


    foreach($_REQUEST['correos'] as $selected){
      $RECEPTOR = $selected;


      $correo= new Correo (str_shuffle("abcdefghijklmnop0123456789".uniqid()),$EMISOR,$RECEPTOR,$ASUNTO,$CONTENIDO,$FECHAENVIO);
      array_push($correoArray,$correo);
    }

    $accion = $_REQUEST['accion'];
    return $correoArray;
}
function gen_data_form(){
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

$EMISOR=$_SESSION['login'];

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
if(isset($_REQUEST['RECEPTOR'])){
   $RECEPTOR=$_REQUEST['RECEPTOR'];
}else{
   $RECEPTOR = null;
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
        if (!isset($_REQUEST['correos'])) {
            if (!tienePermisos('Correo_add')) {
                new Mensaje('No tienes los permisos necesarios', 'CORREO_Controller.php');
            } else {
                $miembros = $correoMapper->listarMiembros();
                new Correo_Add($miembros);
            }
        } else {
            $correo= get_data_form();
            foreach($correo as $input){
              $correoMapper->insertar($input);
            }
            new Mensaje('enviado con exito', 'CORREO_Controller.php');


        }
        break;
      case $strings['Ver']: //Consulta en detalle de un correo
          if (!isset($_REQUEST['ID_CORREO'])) {
              new Correo_Show('','','');
          } else {
              $correo = gen_data_form();
              $datos = $correoMapper->buscarId($_REQUEST['ID_CORREO']);
              if (!tienePermisos('Correo_Show')) {
                  new Mensaje('No tienes los permisos necesarios', 'CORREO_Controller.php');
              } else {
                  new cORREO_Show('buscar',$datos, 'CORREO_Controller.php');
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
