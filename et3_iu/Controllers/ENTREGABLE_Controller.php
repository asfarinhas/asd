<?php
    include "../Models/ENTREGABLE_Model.php";
    include "../Models/TAREA_Model.php";
    include "../Models/MIEMBRO_Model.php";
    include "../Mappers/ENTREGABLE_Mapper.php";
    include "../Views/ENTREGABLE_SHOW_Vista.php";
    include "../Views/ENTREGABLE_DELETE_Vista.php";
    include "../Views/MENSAJE_Vista.php";
    include "../Views/ENTREGABLE_ADD_Vista.php";
    include "../Views/ENTREGABLE_EDIT_Vista.php";

        session_start();
    $mapper = new ENTREGABLE_Mapper();
    $m_mapper= new MiembroMapper();
    $t_mapper = new TAREA_Mapper();

    function showall_entregable(){
        $mapper = new ENTREGABLE_Mapper();
        $t_mapper = new TAREA_Mapper();
        $tarea = $t_mapper->buscarTareaId($_REQUEST["ID_TAREA"]);
        $entregables = $mapper->consultarEntregablesTarea($tarea->getIdTarea());
        if($tarea->getTareaPadre() == null)
            $volver = "TAREA_Controller.php?accion=ID_TAREA={$tarea->getIdTarea()}&proyecto_id={$tarea->getProyecto()->getIDPROYECTO()}";
        else
            $volver = "TAREA_Controller.php?accion=showall_subtarea&ID_TAREA={$tarea->getTareaPadre()->getIdTarea()}&proyecto_id={$tarea->getProyecto()->getIDPROYECTO()}";
        new ENTEGABLE_SHOW_Vista($entregables,$volver);
    }
    
    $accion = '';
    if(isset($_REQUEST["accion"]))
        $accion = $_REQUEST["accion"];
    
    switch ($accion) { //los nombres del case llamadle como querais, como tengais puesto en el formulario en la vista. Esto es solo orientativo
    
        //Viene de clicar en añadir tarea; hay que crear la vista en cuestión
        case "add_entregable_menu":
            new ENTREGABLE_ADD_Vista();
            break;
    
        //Viene de clicar en editar tarea; hay que crear la vista en cuestión
        case "edit_entregable_menu":
            $entregable = $mapper->buscarEntregablePorID($_REQUEST["entregable_ID"]);
            new ENTREGABLE_EDIT_Vista($entregable);
            break;
    
        //Viene de clicar en consultar en detalle tarea; hay que crear la vista en cuestión
        case "show_entregable_menu":
            echo "<h1>VISTA ENTREGABLE SHOW</h1>";
            break;
    
        //Viene de clicar en eliminar tarea; hay que crear la vista en cuestión
        case "delete_entregable_menu":
            $entregable = $mapper->buscarEntregablePorID($_REQUEST["entregable_ID"]);

            new ENTREGABLE_DELETE_Vista($entregable,"./ENTREGABLE_Controller.php?ID_TAREA=".$entregable->getTarea()->getIDTAREA());
            break;
    
    
        case "add_entregable": //insertar usuario nuevo a traves de registro
            $idTarea = $_REQUEST['ID_TAREA'];
            if (isset($_REQUEST['nombre']) && isset($_REQUEST['estado'])){
                $nombre = $_REQUEST['nombre'];
                $estado = $_REQUEST['estado'];
                $tarea = $t_mapper ->buscarTareaId($idTarea);
                $miembro = $tarea ->getMiembro();
                $fecha = new DateTime("now");
                $url = "";

                $entregable = new Entregable(null, $nombre, $estado, $url, $miembro, $fecha, $tarea);

                $result = $mapper -> insertarEntregable($entregable);
                new Mensaje($result,"ENTREGABLE_Controller.php?showall_entregable&ID_TAREA=$idTarea");

            }else{
                showall_entregable();
            }

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

            if(isset($_REQUEST['name']) && isset($_REQUEST['estado'])){

                $nombre = $_REQUEST['nombre'];
                $estado = $_REQUEST['estado'];
                $tarea = $t_mapper ->buscarTareaId($_REQUEST['ID_TAREA']);
                $idTarea = $_REQUEST['ID_TAREA'];
                $nombreDirectorio = "";
                $nombreFichero = "";
                $entregable = $mapper ->buscarEntregablePorID($_REQUEST['entregable_ID']);
                $miembro = $entregable -> getMiembro();

                if (is_uploaded_file($_FILES['archivo']['tmp_name']))
                {
                    $nombreDirectorio = "../Archivos";
                    $nombreFichero = $_FILES['archivo']['name'];

                    $nombreCompleto = $nombreDirectorio . $nombreFichero;
                    if (is_file($nombreCompleto))
                    {
                        $idUnico = time();
                        $nombreFichero = $idUnico . "-" . $nombreFichero;
                    }

                    move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreDirectorio.$nombreFichero);

                }else{
                    new Mensaje("No se ha podido subir el fichero","./ENTREGABLE_Controller.php?accion=add_entregable&entregable_ID=".$_REQUEST['entregable_ID']);
                }

                $entregable = new Entregable($_REQUEST['entregable_ID'],$nombre,$estado,$nombreDirectorio.$nombreFichero,$miembro,new DateTime("now"),$tarea);
                $mapper ->updateEntregable($entregable);
                new Mensaje("Modificado con éxito", "ENTREGABLE_Controller.php?showall_entregable&ID_TAREA=$idTarea");
            }

            /*$nombreArchivo=$_FILES['archivo']['name'];
            $ruta=$_FILES['archivo']['tmp_name'];
            $destino="../Archivos/".$nombreArchivo;
            copy($ruta,$destino);*/
            break;
    
        case "delete_entregable": //eliminar tarea
            $entregable = $mapper->buscarEntregablePorID($_REQUEST["entregable_ID"]);
                if($mapper->eliminarEntregable($entregable))
                    $mensaje = "Eliminado con éxito";
                else
                    $mensaje = "Error en la consulta sobre la base de datos";
            new Mensaje($mensaje,"./ENTREGABLE_Controller.php?ID_TAREA=".$entregable->getTarea()->getIDTAREA());
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


