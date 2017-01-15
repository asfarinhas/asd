<?php

include '../Models/Tarea_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
require_once("../Mappers/TAREA_Mapper.php");
require_once("../Mappers/PROYECTO_Mapper.php");
require_once("../Mappers/MIEMBRO_Mapper.php");
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

$tarea_Mapper=new TAREA_Mapper();
$miembro_mapper = new MiembroMapper();
$proyecto_mapper = new ProyectoMapper();


function get_data_form(){
    $tarea_Mapper=new TAREA_Mapper();
    $miembro_mapper = new MiembroMapper();
    $proyecto_mapper = new ProyectoMapper();


    //Recoge la información del formulario
    if(isset($_REQUEST['ID_TICKET'])){
        $ID_TICKET=$_REQUEST['ID_TICKET'];
    }else{
        $ID_TICKET = null;
    }

    if(isset($_REQUEST['ID_TICKET_PADRE'])){
        $ID_TICKET_PADRE= $tarea_Mapper->buscarTareaId($_REQUEST['ID_TICKET_PADRE']);
    }else{
        $ID_TICKET_PADRE = null;
    }

    if(isset($_REQUEST['ID_PROYECTO'])){
        $PROYECTO=  $proyecto_mapper->buscarMiembroPorUsuario($_REQUEST['ID_PROYECTO']);
    }else{
        $PROYECTO = null;
    }

    if(isset($_REQUEST['ID_MIEMBRO'])){
        $MIEMBRO=$miembro_mapper->buscarMiembroPorUsuario($_REQUEST['ID_MIEMBRO']);
    }else{
        $MIEMBRO = null;
    }

    if(isset($_REQUEST['NOMBRE'])){
        $TICKET_NOMBRE=$_REQUEST['NOMBRE'];
    }else{
        $TICKET_NOMBRE = null;
    }

    if(isset($_REQUEST['DESCRIPCION'])){
        $TICKET_DESCRIPCION=$_REQUEST['DESCRIPCION'];
    }else{
        $TICKET_DESCRIPCION = null;
    }

    if(isset($_REQUEST['FECHAIP'])){
        $TICKET_FECHAIP=$_REQUEST['FECHAIP'];
    }else{
        $TICKET_FECHAIP = null;
    }

    if(isset($_REQUEST['FECHAIR'])){
        $TICKET_FECHAIR=$_REQUEST['FECHAIR'];
    }else{
        $TICKET_FECHAIR = null;
    }

    if(isset($_REQUEST['COMENTARIO'])){
        $COMENTARIO=$_REQUEST['COMENTARIO'];
    }else{
        $COMENTARIO = null;
    }

    if(isset($_REQUEST['FECHAEP'])){
        $TICKET_FECHAEP=$_REQUEST['FECHAEP'];
    }else{
        $TICKET_FECHAEP = null;
    }

    if(isset($_REQUEST['FECHAER'])){
        $TICKET_FECHAER=$_REQUEST['FECHAER'];
    }else{
        $TICKET_FECHAER = null;
    }

    if(isset($_REQUEST['NUMEROHORASR'])){
        $TICKET_NUMEROHORASR=$_REQUEST['NUMEROHORASR'];
    }else{
        $TICKET_NUMEROHORASR = null;
    }

    if(isset($_REQUEST['NUMEROHORASP'])){
        $TICKET_NUMEROHORASP=$_REQUEST['NUMEROHORASP'];
    }else{
        $TICKET_NUMEROHORASP = null;
    }

    if(isset($_REQUEST['ESTADO'])){
        $ESTADO=$_REQUEST['ESTADO'];
    }else{
        $ESTADO = null;
    }

    $accion = $_REQUEST['accion'];

    $ticket = new Tarea($ID_TICKET , $TICKET_NOMBRE, $TICKET_DESCRIPCION, $ID_TICKET_PADRE, $TICKET_FECHAIP, $TICKET_FECHAEP, $TICKET_FECHAIR,
        $TICKET_FECHAER, $TICKET_NUMEROHORASP, $TICKET_NUMEROHORASR, $MIEMBRO, $ESTADO, $COMENTARIO, $PROYECTO);

    return $ticket;
}


if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}


switch ($_REQUEST['accion']) {

    default:
        //La vista por defecto lista todas los TICKETs

        $ticket_padre = $tarea_Mapper->consultarTicketProyecto($_REQUEST["proyecto_id"]);

        $datos = $tarea_Mapper->listarSubtareasPadre($ticket_padre->getIdTarea());
        if (!tienePermisos('TICKET_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new TICKET_Default($datos, '../Views/DEFAULT_Vista.php');

        }

}
?>
