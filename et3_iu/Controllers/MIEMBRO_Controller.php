<?php
/**
 * Created by PhpStorm.
 * User: Claudia
 * Date: 26/12/2016
 * Time: 17:05
 */
include '../Models/MIEMBRO_Model.php';
//include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
include '../Mappers/MIEMBRO_Mapper.php';
include '../Views/MIEMBRO_EDIT_View.php';
include '../Views/MIEMBRO_SHOW_Vista.php';
include '../Views/MIEMBRO_DELETE_Vista.php';
include '../Views/PROYECTO_MIEMBRO_DELETE_Vista.php';
include '../Views/LOGIN_Vista.php';
include '../Functions/LibraryFunctions.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}

function edit_miembro(){  //claudia
    $username = $_SESSION['login'];
    $miembroMapper = new MiembroMapper();

        //parametros del formulario
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['usuario']) && isset($_REQUEST['password']) && isset($_REQUEST['correo'])){
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            $usuario = $_REQUEST['usuario'];
            $contraseña = $_REQUEST['password'];
            $correo =  $_REQUEST['correo'];

            $miembro = new Miembro_Model($nombre, $apellidos, $usuario, $contraseña, $correo);

            //si ha modificado el campo username
            if($username != $usuario){
                //comprobar que no existe el usuario en la bd
                $aux = $miembroMapper->buscarMiembroPorUsuario($usuario);
                if($aux != false){ //existe
                    echo "Username existente, introduzca otro";
                    //muestra la vista
                    $datosmiembro = $miembroMapper->buscarMiembroPorUsuario($username);
                    $vista_modificar = new MiembroEditView($datosmiembro);
                    $vista_modificar->showView();
                }else{ //no existe
                    $miembroMapper->updateMiembro($miembro, $username);
                    consultar_miembro();
                }

            }else{ //no modifico el campo username
                $miembroMapper->updateMiembro($miembro, $username);
                consultar_miembro();
            }

        }else{
            //muestra la vista
            $datosmiembro = $miembroMapper->buscarMiembroPorUsuario($username);
            $vista_modificar = new MiembroEditView($datosmiembro);
            $vista_modificar->showView();

        }//fin parametros
}//fin funcion editar

function add_miembro(){

    $miembroMapper = new MiembroMapper();

    //parametros del formulario
    if(isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['usuario']) && isset($_REQUEST['password']) && isset($_REQUEST['correo'])){

        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $usuario = $_REQUEST['usuario'];
        $contraseña = $_REQUEST['password'];
        $correo =  $_REQUEST['correo'];

        $miembro = new Miembro_Model($nombre, $apellidos, $usuario, $contraseña, $correo);
        $aux = $miembroMapper->buscarMiembroPorUsuario($usuario);
        if($aux != false){ //existe
            echo "Username existente, introduzca otro";
            $vista_add = new MiembroAddView();
        }else{ //no existe
            $miembroMapper->insertarMiembro($miembro);
            new Login();
        }
    }else{
        //muestra la vista
        $vista_add = new MiembroAddView();
    }

}

function delete_miembro(){

    $conectado = $_SESSION['login'];
    $miembroMapper = new MiembroMapper();
    $miembroMapper -> desactivarMiembro($conectado);

    new Login();
}

function consultar_miembro(){
    $miembroMapper = new MiembroMapper();
    $conectado = $_SESSION['login'];

    $usuario = $miembroMapper->buscarMiembroPorUsuario($conectado);

    $vista_show = new MIEMBRO_SHOW_Vista($usuario);
    $vista_show->render();
}

function showTareasMiembro(){

}

function vistaBorrar(){
    $miembroMapper = new MiembroMapper();
    $conectado = $_SESSION['login'];

    $usuario = $miembroMapper->buscarMiembroPorUsuario($conectado);

    new MIEMBRO_BAJA_Vista($usuario);
}



if (!isset($_REQUEST['accion'])){
    $accion = '';
}else{
    $accion = $_REQUEST['accion'];
}


switch ($accion) { //los nombres del case llamadle como querais, como tengais puesto en el formulario en la vista. Esto es solo orientativo

    case "add_menu":
        break;

    case "edit_menu":
        $miembroMapper = new MiembroMapper();
        $datosmiembro = $miembroMapper->buscarMiembroPorUsuario($_SESSION['login']);
        $vista_modificar = new MiembroEditView($datosmiembro);
        $vista_modificar->showView();
        break;

    case "showcurrent_menu":
        break;

    case "show_tareas_miembro_menu":
        break;

    case "add": //insertar usuario nuevo a traves de registro
        add_miembro();
        break;

    case "showcurrent": // consultar perfil propio del usuario
        consultar_miembro();
        break;

    case "edit": //editar perfil propio del usuario
        edit_miembro();
        break;

    case "delete":
        delete_miembro(); //eliminar perfil
        break;

    case "show_tareas_miembro": // filtrar la busqueda de un miembro y mostrar sus tareas
        showTareasMiembro();
        break;

    case "borrar":
        vistaBorrar();
        break;
    default:
        consultar_miembro();

}



?>