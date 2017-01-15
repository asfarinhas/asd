<?php

include '../Models/TAREA_Model.php';
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

$tarea_mapper=new TAREA_Mapper();
$miembro_mapper = new MiembroMapper();
$proyecto_mapper = new ProyectoMapper();

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}


switch ($_REQUEST['accion']) {

    case "add":
        //Recoger variables de la vista
        //Comprobaciones de datos
        //;
        $id_proyecto = $_REQUEST['proyecto_id']; // id del proyecto, obtenido por get
        $proyecto = $proyecto_mapper->buscarId($id_proyecto);
        //parametros del formulario
        if( isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['fecha_inicio_plan'])
            && isset($_REQUEST['fecha_entrega_plan']) && isset($_REQUEST['horas_plan']) && isset($_REQUEST['miembro']) && isset($_REQUEST['comentario'])) {


            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $fecha_inicio_plan = $_REQUEST['fecha_inicio_plan'];
            $fecha_entrega_plan = $_REQUEST['fecha_entrega_plan'];
            $fecha_inicio_real = null;
            $fecha_entrega_real = null;
            $horas_plan = $_REQUEST['horas_plan'];
            $horas_real = null;
            $miembro = $_REQUEST['miembro']; //user de miembro
            $estado_tarea = "pendiente";
            $comentario = $_REQUEST['comentario'];


            $padreId =  $tarea_mapper->consultarTicketProyecto($_REQUEST["proyecto_id"]);
            $miembroModel = $miembro_mapper->buscarMiembroPorUsuario($miembro);


            $subtarea = new Tarea(/*idTarea*/
                NULL, $nombre, $descripcion, $padreId, $fecha_inicio_plan, $fecha_entrega_plan, $fecha_inicio_real,
                $fecha_entrega_real, $horas_plan, $horas_real, $miembroModel, $estado_tarea, $comentario, $proyecto);


            //Insertar datos en la tabla tarea en la BBDD
            $result = $tarea_mapper->insertarSubTarea($subtarea);

            //Mostrar mensaje de confirmación
            //Volver al menú de subtareas

            new Mensaje($result, "TAREA_Controller.php?proyecto_id=" . $proyecto->getIDPROYECTO());
        }else{
            $miembros_proyecto = $miembro_mapper->listarMiembrosProyecto($_REQUEST['proyecto_id']);

            $vista_addsubtarea = new TICKET_ADD_View($miembros_proyecto, "TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
            $vista_addsubtarea->showView();
        }//fin parametros

        break;

    default:
        //La vista por defecto lista todas los TICKETS

        $ticket_padre = $tarea_mapper->consultarTicketProyecto($_REQUEST["proyecto_id"]);

        $datos = $tarea_mapper->listarSubtareasPadre($ticket_padre->getIdTarea());
        if (!tienePermisos('TICKET_SHOW_ALL_Vista')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new TICKET_SHOW_ALL_Vista($datos, '../Views/DEFAULT_Vista.php');

        }

}
?>
