<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 28/12/2016
 * Time: 20:00
 */

include '../Models/TAREA_Model.php';
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
include '../Mappers/TAREA_Mapper.php';
include '../Views/TAREA_EDIT_View.php';
include '../Views/TAREA_ADD_View.php';
include '../Views/TAREA_SHOW_View.php';
include '../Views/TAREA_VIEW_View.php';
include '../Views/TAREA_DELETE_View.php';
include '../Views/SUBTAREA_EDIT_View.php';
include '../Views/SUBTAREA_ADD_View.php';
include '../Views/SUBTAREA_SHOW_View.php';
include '../Views/SUBTAREA_VIEW_View.php';
include '../Views/SUBTAREA_DELETE_View.php';
include '../Mappers/MIEMBRO_Mapper.php'; //necesario para obtener todos los datos de miembro para usar modelo de este tipo


if (!IsAuthenticated()){
    header('Location:../index.php');
}

function add_tarea(){
    //Recoger variables de la vista
    //Comprobaciones de datos, longitud, ...
    //Insertar datos en la tabla tarea en la BBDD
    //Mostrar mensaje de confirmación
    //Volver al menú de tareas
}

function edit_tarea(){
    //Recoger las nuevas variables
    //Comprobaciones
    //Actualización datos en la BBDD
    //Mensaje de confirmación
    //volver al menú de tareas
}

function show_tarea(){
    //Recoger de la BBDD los datos de la tarea con ese id
    //Mostrar una vista con todos los datos //Incluir las subtarea o un enlace al showall de subtareas y un + para añadir  subtareas?
}

function showall_tarea(){
    //Acceder a la base de datos y consultar todas las tareas con padre == null
    //Mostrar un listado con algunos de los datos de las tareas (id, fecha inicio, fecha fin, estado, por ejemplo) y los botones consultar
    //modificar, eliminar
}

function delete_tarea(){
    //Comprobacion de la eliminacion en javascript, una vez confirmada se viene aqui
    //Eliminar de la base de datos la tarea
    //Mensaje de confirmación.
    //Volver al menu de tareas
}

function add_subtarea(){
    //Recoger variables de la vista
    //Comprobaciones de datos, longitud, ...

    //Mostrar mensaje de confirmación
    //Volver al menú de subtareas

    $tareaMapper = new TAREA_Mapper();
    $miembroMapper = new MiembroMapper();
    $proyectoMapper = new ProyectoMapper();

    //parametros del formulario
    if( isset($_REQUEST['tarea_padre']) && isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['fecha_inicio_plan']) && isset($_REQUEST['fecha_entrega_plan']) && isset($_REQUEST['fecha_inicio_real'])
        && isset($_REQUEST['fecha_entrega_real']) && isset($_REQUEST['horas_plan']) && isset($_REQUEST['horas_real']) && isset($_REQUEST['miembro']) && isset($_REQUEST['estado_tarea']) && isset($_REQUEST['comentario'])){

        $tarea_padre = $_REQUEST['tarea_padre'];  //id de tarea padre, obtenido por get
        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion'];
        $fecha_inicio_plan = $_REQUEST['fecha_inicio_plan'];
        $fecha_entrega_plan = $_REQUEST['fecha_entrega_plan'];
        $fecha_inicio_real =  $_REQUEST['fecha_inicio_real'];
        $fecha_entrega_real = $_REQUEST['fecha_entrega_real'];
        $horas_plan = $_REQUEST['horas_plan'];
        $horas_real = $_REQUEST['horas_real'];
        $miembro =  $_REQUEST['miembro']; //user de miembro
        $estado_tarea = $_REQUEST['estado_tarea'];
        $comentario =  $_REQUEST['comentario'];


        $padreId = $tareaMapper->buscarTareaId($tarea_padre);
        $miembroModel = $miembroMapper->buscarMiembroPorUsuario($miembro);

        $subtarea = new Tarea(/*idTarea*/ NULL, $nombre, $descripcion, $padreId, $fecha_inicio_plan, $fecha_entrega_plan, $fecha_inicio_real,
                                $fecha_entrega_real, $horas_plan, $horas_real,  $miembroModel, $estado_tarea, $comentario);

        //Insertar datos en la tabla tarea en la BBDD
        $result = $tareaMapper->insertarTarea($subtarea);

        /*if($result != "Creado con éxito. "){
            echo $result;

            $miembros_proyecto = $proyectoMapper->listarMiembrosProyecto();
            $vista_addsubtarea = new Subtarea_add()

        }*/




    }else{
        //muestra la vista
        /*$datosmiembro = $miembroMapper->buscarMiembroPorUsuario($username);
        $vista_modificar = new MiembroEditView($datosmiembro);
        $vista_modificar->showView();*/

    }//fin parametros
}

function edit_subtarea(){
    //Recoger las nuevas variables
    //Comprobaciones
    //Actualización datos en la BBDD
    //Mensaje de confirmación
    //volver al menú de subtareas
}

function show_subtarea(){
    //Recoger de la BBDD los datos de las subtarea con padre el id de la tarea padre
    //Mostrar una vista con todos esos datos
}

function showall_subtarea(){
    //Acceder a la base de datos y consultar todas las tareas con padre == id_tarea del padre
    //Mostrar un listado con algunos de los datos de las subtareas (id, fecha inicio, fecha fin, estado, por ejemplo) y los botones consultar
    //modificar, eliminar
}

function delete_subtarea(){
    //Comprobacion de la eliminacion en javascript, una vez confirmada se viene aqui
    //Eliminar de la base de datos la tarea
    //Mensaje de confirmación.
    //Volver al menu de subtareas
}




if (!isset($_REQUEST['accion'])){
    $accion = '';
}else{
    $accion = $_REQUEST['accion'];
}


switch ($accion) { //los nombres del case llamadle como querais, como tengais puesto en el formulario en la vista. Esto es solo orientativo

    //Viene de clicar en añadir tarea; hay que crear la vista en cuestión
    case "add_tarea_menu":
        break;

    //Viene de clicar en editar tarea; hay que crear la vista en cuestión
    case "edit_tarea_menu":
        break;

     //Viene de clicar en consultar en detalle tarea; hay que crear la vista en cuestión
    case "show_tarea_menu":
        break;

     //Viene de clicar en consultar todas las tarea; hay que crear la vista en cuestión
    case "showall_tarea_menu":
        break;

     //Viene de clicar en eliminar tarea; hay que crear la vista en cuestión
    case "delete_tarea_menu":
        break;


    case "add_tarea": //insertar usuario nuevo a traves de registro
        add_tarea();
        break;

    case "show_tarea": // consultar datos de la tarea
        show_tarea();
        break;

    case "showall_tarea": // mostrar algunos atributos de todas las tareas
        showall_tarea();
        break;

    case "edit_tarea": //editar tarea
        edit_tarea();
        break;

    case "delete_tarea": //eliminar tarea
        delete_tarea();
        break;

    case "add_subtarea": //Agregar una subtarea
        add_subtarea();
        break;

    case "show_subtarea": //Mostrar detalles de una subtarea
        show_subtarea();
        break;

    case "showall_subtarea": //Mostrar algunos atributos de todas las subtareas
        showall_subtarea();
        break;

    case "edit_subtarea": //Editar una subtarea
        edit_subtarea();
        break;

    case "delete_subtarea": //Eliminar una subtarea
        delete_subtarea();
        break;

    default:
        showall_tarea();

}



?>