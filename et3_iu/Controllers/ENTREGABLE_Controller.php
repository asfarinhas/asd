<?php
    include "../Models/ENTREGABLE_Model.php";
    include "../Models/TAREA_Model.php";
    include "../Models/MIEMBRO_Model.php";
    include "../Mappers/ENTREGABLE_Mapper.php";
    include "../Views/ENTREGABLE_SHOW_Vista.php";

    $mapper = new ENTREGABLE_Mapper();
    $m_mapper= new MiembroMapper();
    $t_mapper = new TAREA_Mapper();
    
    $accion = '';
    if(isset($_REQUEST["accion"]))
        $accion = $_REQUEST["accion"];
    
    switch ($accion) { //los nombres del case llamadle como querais, como tengais puesto en el formulario en la vista. Esto es solo orientativo
    
        //Viene de clicar en añadir tarea; hay que crear la vista en cuestión
        case "add_entregable_menu":
            break;
    
        //Viene de clicar en editar tarea; hay que crear la vista en cuestión
        case "edit_entregable_menu":
            break;
    
        //Viene de clicar en consultar en detalle tarea; hay que crear la vista en cuestión
        case "show_entregable_menu":
            break;
    
        //Viene de clicar en consultar todas las tarea; hay que crear la vista en cuestión
        case "showall_entregable_menu":
            break;
    
        //Viene de clicar en eliminar tarea; hay que crear la vista en cuestión
        case "delete_entregable_menu":
            break;
    
    
        case "add_entregable": //insertar usuario nuevo a traves de registro
            break;
    
        case "show_entregable": // consultar datos de la tarea
            break;
    
        case "showall_entregable": // mostrar algunos atributos de todas las tareas
            $tarea = $t_mapper->buscarTareaId($_REQUEST["ID_TAREA"]);
            $entregables = $mapper->consultarEntregablesTarea($tarea->getIdTarea());
            if($tarea->getTareaPadre() == null)
                $volver = "TAREA_Controller.php?accion=ID_TAREA={$tarea->getIdTarea()}&proyecto_id={$tarea->getProyecto()->getIDPROYECTO()}";
            else
                $volver = "TAREA_Controller.php?accion=showall_subtarea&ID_TAREA={$tarea->getTareaPadre()->getIdTarea()}&proyecto_id={$tarea->getProyecto()->getIDPROYECTO()}";
            new ENTEGABLE_SHOW_Vista($entregables,$volver);
            break;
    
        case "edit_entregable": //editar tarea
            break;
    
        case "delete_entregable": //eliminar tarea
            break;
        default:
            $tarea = $t_mapper->buscarTareaId($_REQUEST["ID_TAREA"]);
            $entregables = $mapper->consultarEntregablesTarea($tarea->getIdTarea());
            if($tarea->getTareaPadre() == null)
                $volver = "TAREA_Controller.php?accion=ID_TAREA={$tarea->getIdTarea()}&proyecto_id={$tarea->getProyecto()->getIDPROYECTO()}";
            else
                $volver = "TAREA_Controller.php?accion=showall_subtarea&ID_TAREA={$tarea->getTareaPadre()->getIdTarea()}&proyecto_id={$tarea->getProyecto()->getIDPROYECTO()}";
            new ENTEGABLE_SHOW_Vista($entregables,$volver);
    
    }
?>


