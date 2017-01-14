<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 28/12/2016
 * Time: 20:00
 */
include '../Functions/LibraryFunctions.php';
include '../Models/TAREA_Model.php';
include '../Mappers/TAREA_Mapper.php';
include '../Views/MENSAJE_Vista.php';
include '../Views/TAREA_EDIT_View.php';
include '../Views/TAREA_ADD_View.php';
include '../Views/TAREA_SHOW_CURRENT_Vista.php';
include '../Views/TAREA_SHOW_ALL_Vista.php';
include '../Views/TAREA_DELETE_View.php';
include '../Views/SUBTAREA_EDIT_View.php';
include '../Views/SUBTAREA_ADD_View.php';
include '../Views/SUBTAREA_SHOW_ALL_Vista.php';
include '../Views/SUBTAREA_SHOW_CURRENT_Vista.php';
include '../Views/SUBTAREA_DELETE_Vista.php';
include '../Mappers/MIEMBRO_Mapper.php'; //necesario para obtener todos los datos de miembro para usar modelo de este tipo
//include '../Mappers/PROYECTO_Mapper.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

function add_tarea(){
    $miembro_mapper = new MiembroMapper();
    $proyecto_mapper = new ProyectoMapper();
    $tarea_mapper = new TAREA_Mapper();
    $proyecto = $proyecto_mapper->buscarId($_REQUEST['proyecto_id']);
    if(isset($_REQUEST["nombre"])){


        $nombre = $_REQUEST["nombre"];
        $fecha_I_P = $_REQUEST["fecha_I_P"];
        $fecha_E_P = $_REQUEST["fecha_E_P"];
        $horas_P = $_REQUEST["horas_P"];
        $miembro = $miembro_mapper->buscarMiembroPorUsuario($_REQUEST["miembro"]);

        if(isset($_REQUEST["descripcion"]))
            $descripcion = $_REQUEST["descripcion"];
        else
            $descripcion = null;
        if(isset($_REQUEST["comentarios"]))
            $comentarios = $_REQUEST["comentarios"];
        else
            $comentarios = null;
        $tarea = new Tarea(null,$nombre,$descripcion,null,$fecha_I_P,$fecha_E_P,null,null,$horas_P,null,$miembro,"pendiente",$comentarios,$proyecto);
        $mensaje = $tarea_mapper->insertarTarea($tarea);
        $vista = new TareaShowAllVista($tarea);
        $vista->showAll();
        //new Mensaje($mensaje,"TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
    }else{
        $miembros = $miembro_mapper->listarMiembrosProyecto($proyecto->getIDPROYECTO());
        new TAREA_ADD_Vista($miembros,"TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
    }
}

function edit_tarea(){
    $miembro_mapper = new MiembroMapper();
    $proyecto_mapper = new ProyectoMapper();
    $tarea_mapper = new TAREA_Mapper();
    $proyecto = $proyecto_mapper->buscarId($_REQUEST['proyecto_id']);
    if(isset($_REQUEST["nombre"])){

        $tarea = $tarea_mapper->buscarTareaId($_REQUEST["tarea_id"]);

        if(isset($_REQUEST["nombre"]))
        $tarea->setNombre($_REQUEST["nombre"]);
        if(isset($_REQUEST["fecha_I_P"]))
            $tarea->setFechaInicioPlan($_REQUEST["fecha_I_P"]);
        if(isset($_REQUEST["fecha_I_R"]))
           $tarea->setFechaInicioReal($_REQUEST["fecha_I_R"]);
        if(isset($_REQUEST["fecha_E_P"]))
        $tarea->setFechaEntregaPlan($_REQUEST["fecha_E_P"]);
        if(isset($_REQUEST["fecha_E_R"]))
            $tarea->setFechaEntregaReal($_REQUEST["fecha_E_R"]);
        if(isset($_REQUEST["horas_P"]))
            $horas_P = $_REQUEST["horas_P"];
        if(isset($_REQUEST["horas_R"]))
            $tarea->setHorasReal($_REQUEST["horas_R"]);
        if(isset($_REQUEST["miembro"]))
            $tarea->setMiembro($miembro_mapper->buscarMiembroPorUsuario($_REQUEST["miembro"]));
        if(isset($_REQUEST["estado"]))
        $tarea ->setEstadoTarea($_REQUEST["estado"]);
        if(isset($_REQUEST["descripcion"]))
            $tarea->setDescripcion($_REQUEST["descripcion"]);
        if(isset($_REQUEST["comentarios"]))
            $tarea->setComentario($_REQUEST["comentarios"]);

        $mensaje = $tarea_mapper->modificarTarea($tarea);
        new Mensaje($mensaje,"TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
    }else{
        $miembros = $miembro_mapper->listarMiembrosProyecto($proyecto->getIDPROYECTO());
        $tarea = $tarea_mapper->buscarTareaId($_REQUEST["tarea_id"]);
        new TAREA_EDIT_Vista($tarea, $miembros,"TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
    }
}

function show_tarea(){
    $tarea_mapper = new TAREA_Mapper();
    if(isset($_REQUEST['ID_TAREA'])){
        $tarea = $tarea_mapper->buscarTareaIdParaProyecto($_REQUEST['ID_TAREA'], $_REQUEST['proyecto_id']);
        $vista = new TAREA_SHOW_CURRENT_Vista($tarea);
    }

}

function showall_tarea(){
    //Acceder a la base de datos y consultar todas las tareas con padre == null

    $tarea_mapper = new TAREA_Mapper();
    $tareas = $tarea_mapper->listarTareasPadreProyecto($_REQUEST['proyecto_id']);

    $vista = new TareaShowAllVista($tareas);
    $vista->showAll();

}

function delete_tarea(){
    $tareaMapper = new TAREA_Mapper();
    $idtarea = $_REQUEST['ID_TAREA'];
    $tarea = $tareaMapper -> buscarTareaId($idtarea);
    $vistaDelete = new TAREA_DELETE_View($tarea);

    //Mensaje de confirmación.
    //Volver al menu de tareas
}

function add_subtarea(){
    //Recoger variables de la vista
    //Comprobaciones de datos

    $tareaMapper = new TAREA_Mapper();
    $miembroMapper = new MiembroMapper();
    $proyectoMapper = new ProyectoMapper();
    $tarea_padre = $_REQUEST['tarea_padre'];
    $id_proyecto = $_REQUEST['proyecto_id']; // id del proyecto, obtenido por get
    $proyecto = $proyectoMapper->buscarId($id_proyecto);
    //parametros del formulario
    if( isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['fecha_inicio_plan'])
        && isset($_REQUEST['fecha_entrega_plan']) && isset($_REQUEST['horas_plan']) && isset($_REQUEST['miembro']) && isset($_REQUEST['comentario'])){


        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion'];
        $fecha_inicio_plan = $_REQUEST['fecha_inicio_plan'];
        $fecha_entrega_plan = $_REQUEST['fecha_entrega_plan'];
        $fecha_inicio_real =  null;
        $fecha_entrega_real = null;
        $horas_plan = $_REQUEST['horas_plan'];
        $horas_real = null;
        $miembro =  $_REQUEST['miembro']; //user de miembro
        $estado_tarea = "pendiente";
        $comentario =  $_REQUEST['comentario'];



        $padreId = $tareaMapper->buscarTareaId($tarea_padre);
        $miembroModel = $miembroMapper->buscarMiembroPorUsuario($miembro);

        //$proyectoModel = new Proyecto($proyecto[0],$proyecto[1],$proyecto[2],$proyecto[3],$proyecto[4],$proyecto[5],$proyecto[6],$proyecto[7],$proyecto[8],null,$proyecto[10]);

        $subtarea = new Tarea(/*idTarea*/ NULL, $nombre, $descripcion, $padreId, $fecha_inicio_plan, $fecha_entrega_plan, $fecha_inicio_real,
            $fecha_entrega_real, $horas_plan, $horas_real,  $miembroModel, $estado_tarea, $comentario, $proyecto);


        //Insertar datos en la tabla tarea en la BBDD
        $result = $tareaMapper->insertarSubTarea($subtarea);

        //Mostrar mensaje de confirmación
        //Volver al menú de subtareas

        new Mensaje($result,"TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());

    }else{
        $miembros_proyecto = $miembroMapper->listarMiembrosProyecto($_REQUEST['proyecto_id']);

        $vista_addsubtarea = new Subtarea_add($miembros_proyecto, "TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
        $vista_addsubtarea->showView();
    }//fin parametros
}//fin funcion

function edit_subtarea()
{
    $tareaMapper = new TAREA_Mapper();
    $miembroMapper = new MiembroMapper();
    $proyectoMapper = new ProyectoMapper();
    if( isset($_REQUEST["proyecto_id"]) && isset($_REQUEST["ID_TAREA"])){
        $proyecto = $proyectoMapper->buscarId($_REQUEST['proyecto_id']);
        //$proyectoModel = new Proyecto($proyecto[0], $proyecto[1], $proyecto[2], $proyecto[3], $proyecto[4], $proyecto[5], $proyecto[6], $proyecto[7], $proyecto[8], null, $proyecto[10]);


            $tarea = $tareaMapper->buscarTareaId($_REQUEST["ID_TAREA"]);

            if(isset($_REQUEST['nombre']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['fecha_inicio_plan'])
            && isset($_REQUEST['fecha_entrega_plan']) && isset($_REQUEST['fecha_inicio_real']) && isset($_REQUEST['fecha_entrega_real'])
            && isset($_REQUEST['horas_plan']) && isset($_REQUEST['horas_real']) && isset($_REQUEST['miembro']) && isset($_REQUEST['estado_tarea'])
            && isset($_REQUEST['comentario'])){

                $tarea->setNombre($_REQUEST["nombre"]);
                $tarea->setDescripcion($_REQUEST["descripcion"]);
                $tarea->setFechaInicioPlan($_REQUEST["fecha_inicio_plan"]);
                $tarea->setFechaInicioReal($_REQUEST["fecha_inicio_real"]);
                $tarea->setFechaEntregaPlan($_REQUEST["fecha_entrega_plan"]);
                $tarea->setFechaEntregaReal($_REQUEST["fecha_entrega_real"]);
                $tarea->setHorasPlan($_REQUEST["horas_plan"]);
                $tarea->setHorasReal($_REQUEST["horas_real"]);
                $tarea->setMiembro($miembroMapper->buscarMiembroPorUsuario($_REQUEST["miembro"]));
                $tarea->setEstadoTarea($_REQUEST["estado_tarea"]);
                $tarea->setComentario($_REQUEST["comentario"]);

                $mensaje = $tareaMapper->modificarTarea($tarea);
                new Mensaje($mensaje, "TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());


        }else{
            $miembros = $miembroMapper->listarMiembrosProyecto($_REQUEST['proyecto_id']);
            $tarea = $tareaMapper->buscarTareaId($_REQUEST["ID_TAREA"]);

            $vista_subtarea_edit =new Subtarea_edit($tarea, $miembros, "TAREA_Controller.php?proyecto_id=".$proyecto->getIDPROYECTO());
            $vista_subtarea_edit->showView();
        }

}

   /* $miembros = $miembroMapper->listarMiembrosProyecto($_REQUEST['id_proyecto']);
    $tarea = $tareaMapper->buscarTareaId($_REQUEST["id_tarea"]);
    $vista_subtarea_edit =new Subtarea_edit($tarea, $miembros);
    $vista_subtarea_edit->showView();*/
}

function show_subtarea(){

   $tareaID = $_REQUEST['ID_TAREA'];

   $tareaMapper = new TAREA_Mapper();
   $subtarea = $tareaMapper -> buscarTareaId($tareaID);

   $vistaSubtarea = new SUBTAREA_SHOW_CURRENT_Vista($subtarea);
    //Recoger de la BBDD los datos de las subtarea con padre el id de la tarea padre
    //Mostrar una vista con todos esos datos
}

function showall_subtarea(){

    $tarea_mapper = new TAREA_Mapper();
    $tareas = $tarea_mapper->listarSubtareasPadre($_REQUEST['ID_TAREA']);

    $vista = new SUBTAREA_SHOW_ALL_Vista($tareas);
    $vista->mostrarSubtareas();
}

function delete_subtarea(){

    $tareaMapper = new TAREA_Mapper();
    $idSubtarea = $_REQUEST['ID_TAREA'];
    $subtarea = $tareaMapper -> buscarTareaId($idSubtarea);
    $vistaDelete = new SUBTAREA_DELETE_Vista($subtarea);
}

function borrar_subtarea(){

    $id = $_REQUEST['id_subtarea'];
    $tareaMapper = new TAREA_Mapper();
    $tareaMapper -> borrarTarea($id);
    showall_subtarea();
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

    case "delete_subtarea": //vista eliminar subtarea
        delete_subtarea();
        break;

    case "borrar_subtarea": //eliminar subtarea
        borrar_subtarea();
        break;

    default:
        showall_tarea();

}



?>