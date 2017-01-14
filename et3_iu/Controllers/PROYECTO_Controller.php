<?php

include '../Models/PROYECTO_Model.php';
include '../Locates/Strings_Castellano.php';
include '../Functions/LibraryFunctions.php';
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

$proyectoMapper=new ProyectoMapper();


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
    if(isset($_REQUEST['BORRADO'])){
        $PROYECTO_BORRADO=$_REQUEST['BORRADO'];
    }else{
        $PROYECTO_BORRADO = null;
    }

    $accion = $_REQUEST['accion'];

    $director = new Miembro('','',$PROYECTO_DIRECTOR,'','');
    $proyecto = new Proyecto($ID_PROYECTO,$PROYECTO_NOMBRE,$PROYECTO_DESCRIPCION,$PROYECTO_FECHAI,$PROYECTO_FECHAIP,$PROYECTO_FECHAE,$PROYECTO_FECHAFP,$PROYECTO_NUMEROMIEMBROS,$PROYECTO_NUMEROHORAS,$director,$PROYECTO_BORRADO);

    return $proyecto;
}


function get_data_form_miembro(){

//Recoge la información del formulario
    if(isset($_REQUEST['ID_MIEMBRO'])){
        $ID_MIEMBRO=$_REQUEST['ID_MIEMBRO'];
    }else{
        $ID_MIEMBRO = null;
    }

    if(isset($_REQUEST['MIEMBRO_NOMBRE'])){
        $MIEMBRO_NOMBRE=$_REQUEST['MIEMBRO_NOMBRE'];
    }else{
        $MIEMBRO_NOMBRE = null;
    }

    if(isset($_REQUEST['MIEMBRO_APELLIDO'])){
        $MIEMBRO_APELLIDO=$_REQUEST['MIEMBRO_APELLIDO'];
    }else{
        $MIEMBRO_APELLIDO = null;
    }

    if(isset($_REQUEST['MIEMBRO_EMAIL'])){
        $MIEMBRO_EMAIL=$_REQUEST['MIEMBRO_EMAIL'];
    }else{
        $MIEMBRO_EMAIL = null;
    }

    $accion = $_REQUEST['accion'];

    $miembro = new Miembro($MIEMBRO_NOMBRE, $MIEMBRO_APELLIDO,$ID_MIEMBRO,null,$MIEMBRO_EMAIL);

    return $miembro;
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

switch ($_REQUEST['accion']) {
    case $strings['Insertar']: //Inserción de proyecto
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            if (!tienePermisos('Proyecto_Add')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {
                new Proyecto_Add();
            }
        } else {

            $proyecto= get_data_form();
            $respuesta = $proyectoMapper->insertar($proyecto);
            new Mensaje($respuesta, 'PROYECTO_Controller.php');

        }
        break;

    case $strings['Borrar']: //Borrado de proyecto
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            $proyecto = get_data_form();
            $valores = $proyectoMapper->RellenaDatos($proyecto->getIDPROYECTO());
            if (!tienePermisos('Proyecto_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {
                new Proyecto_Borrar($valores, 'PROYECTO_Controller.php');
            }
        } else {
            $proyecto = get_data_form();
            $respuesta = $proyectoMapper->borrar($proyecto);
            new Mensaje($respuesta, 'PROYECTO_Controller.php');
        }
        break;

    case $strings['Modificar']: //Modificación de proyecto

        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {

            $proyecto = get_data_form();
            $valores = $proyectoMapper->RellenaDatos($proyecto->getIDPROYECTO());

            if (!tienePermisos('Proyecto_Modificar')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {

                new Proyecto_Modificar($valores, 'PROYECTO_Controller.php');
            }
        } else {
            $proyecto = get_data_form();
            $respuesta = $proyectoMapper->modificar($proyecto);
            new Mensaje($respuesta, 'PROYECTO_Controller.php');
        }
        break;

    case $strings['Ver']: //Consulta de proyecto
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            new Proyecto_Show('','','');
        } else {

            $datos = $proyectoMapper->buscarNombre($_REQUEST['PROYECTO_NOMBRE']);
            if (!tienePermisos('Proyecto_Show')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {

                new Proyecto_Show('buscar',$datos, 'PROYECTO_Controller.php');
            }
        }
        break;

    case $strings['Consultar']: //Consulta de proyecto
        if (!isset($_REQUEST['BUSCAR'])) {
            new Proyecto_Show('','','');
        } else {
            $proyecto = get_data_form();
            $datos = $proyectoMapper->buscar($proyecto);
            if (!tienePermisos('Proyecto_Show')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {

                new Proyecto_Default($datos, 'PROYECTO_Controller.php');
            }
        }
        break;

    case $strings['ConsultarBorrados']: //Consulta de proyectos borrados
        //La vista por defecto lista todas los proyectos
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            $proyecto = new Proyecto('', '','','','','','','','',null,'');
        } else {
            $proyecto = get_data_form();
        }
        $datos = $proyectoMapper->listarBorrados();
        if (!tienePermisos('Proyecto_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Proyecto_Default($datos, 'PROYECTO_Controller.php');

        }
        break;

    //Insertar un mimebro a un proyecto
    case $strings['Insertar Miembro']:
        if(!isset($_REQUEST['ID_MIEMBRO'])){
            $miembros =  $proyectoMapper->consultarMiembros($_REQUEST['ID_PROYECTO']);
            if (!tienePermisos('ProyectoMiembro_Add')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/PROYECTO_SHOW_ALL_Vista.php');
            } else {
                new ProyectoMiembro_Add($miembros,'', '../Views/PROYECTO_SHOW_ALL_Vista.php');
            }
        }else{
            if(isset($_REQUEST['BUSCAR'])){
                $miembro = get_data_form_miembro();
                $datos = $proyectoMapper->buscarMiembro($miembro);
                if (!tienePermisos('ProyectoMiembro_Add')) {
                    new Mensaje('No tienes los permisos necesarios', '../Views/PROYECTO_SHOW_ALL_Vista.php');
                } else {
                    new ProyectoMiembro_Add($datos,$_REQUEST['BUSCAR'], 'PROYECTO_MIEMBRO_SHOW_ALL.php');
                }
            }else{
                $respuesta = $proyectoMapper->insertarMiembroProyecto($_REQUEST['ID_PROYECTO'],$_REQUEST['ID_MIEMBRO']);

                new Mensaje($respuesta, 'PROYECTO_Controller.php');
            }
        }
        break;

    //Eliminar miembros de un proyecto
    case $strings['Eliminar Miembros']:


        if (!isset($_REQUEST['BORRAR'])) {
            $miembro = get_data_form_miembro();
            $proyecto = get_data_form();
            $valores = $proyectoMapper->RellenaDatosMiembro($miembro->getUsuario());
            if (!tienePermisos('ProyectoMiembro_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/PROYECTO_MIEMBRO_SHOW_ALL_Vista.php');
            } else {
                new ProyectoMiembro_Borrar($valores, '../Views/PROYECTO_MIEMBRO_SHOW_ALL_Vista.php');
            }
        } else {
            $miembro = get_data_form_miembro();
            $proyecto = get_data_form();
            $respuesta = $proyectoMapper->borrarMiembroProyecto($miembro, $proyecto);
            new Mensaje($respuesta, '../Views/PROYECTO_MIEMBRO_SHOW_ALL_Vista.php');
        }
        break;

    //Listar mimembros de un proyecto
    case  $strings['Gestionar Miembros']:
            $miembros = $proyectoMapper->listarMiembrosProyecto($_REQUEST['ID_PROYECTO']);
            if (!tienePermisos('ProyectoMiembro_Default')) {
                new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
            } else {
                new ProyectoMiembro_Default($miembros,$_REQUEST['ID_PROYECTO'], 'PROYECTO_Controller.php');
            }
        break;

    case $strings['Consultar Miembro']: //Consulta de miembros del proyecto
        if (!isset($_REQUEST['BUSCAR'])) {
            new ProyectoMiembro_Show('','','PROYECTO_Controller.php');
        } else {
            $proyecto = get_data_form();
            $miembro = get_data_form_miembro();
            $datos = $proyectoMapper->buscarMiembroProyecto($miembro,$proyecto);
            if (!tienePermisos('Proyecto_Show')) {
                new Mensaje('No tienes los permisos necesarios', '../Views/PROYECTO_SHOW_ALL_Vista.php');
            } else {

                new ProyectoMiembro_Default($datos,$proyecto->getIDPROYECTO(), '../Views/PROYECTO_SHOW_ALL_Vista.php');
            }
        }
        break;

         case $strings['Ver Miembro']: //Consulta de proyecto
             if (!isset($_REQUEST['ID_MIEMBRO'])) {
                 new ProyectoMiembro_Show('','','');
             } else {

                 $miembro = $proyectoMapper->buscarMiembroPorUsuario($_REQUEST['ID_MIEMBRO']);
                 if (!tienePermisos('ProyectoMiembro_Show')) {
                     new Mensaje('No tienes los permisos necesarios', 'PROYECTO_Controller.php');
                 } else {

                     new ProyectoMiembro_Show('buscar',$miembro, 'PROYECTO_Controller.php');
                 }
             }
             break;

    default:
        //La vista por defecto lista todas los proyectos
        if (!isset($_REQUEST['PROYECTO_NOMBRE'])) {
            $proyecto = new Proyecto('', '','','','','','','','',null,'');
        } else {
            $proyecto = get_data_form();
        }
        $datos = $proyectoMapper->listar();
        if (!tienePermisos('Proyecto_Default')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new Proyecto_Default($datos, '../Views/DEFAULT_Vista.php');

        }

}

?>
