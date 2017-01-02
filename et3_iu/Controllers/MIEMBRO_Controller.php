<?php
/**
 * Created by PhpStorm.
 * User: Claudia
 * Date: 26/12/2016
 * Time: 17:05
 */
include '../Models/MIEMBRO_Model.php';
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
include '../Mappers/MIEMBRO_Mapper.php';
include '../Views/MIEMBRO_EDIT_View.php';
include '../LOGIN_Vista.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}



function edit_miembro(){  //claudia
    $username = $_SESSION['login'];
    $miembroMapper = new MiembroMapper();

        //parametros del formulario
        if(isset($_REQUEST['NOMBRE']) && isset($_REQUEST['APELLIDOS']) && isset($_REQUEST['USUARIO']) && isset($_REQUEST['CONTRASEÑA']) && isset($_REQUEST['CORREO'])){
            $nombre = $_REQUEST['NOMBRE'];
            $apellidos = $_REQUEST['APELLIDOS'];
            $usuario = $_REQUEST['USUARIO'];
            $contraseña = $_REQUEST['CONTRASEÑA'];
            $correo =  $_REQUEST['CORREO'];

            $miembro = new Miembro_Model($nombre, $apellidos, $usuario, $contraseña, $correo);

            //si ha modificado el campo username
            if($username != $usuario){
                //comprobar que no existe el usuario en la bd
                $aux = $miembroMapper->buscarMiembroPorUsuario($usuario);
                if($aux != false){ //existe
                    echo "Username existente, introduzca otro";
                }else{ //no existe
                    $miembroMapper->updateMiembro($miembro, $username);
                }

            }else{ //no modifico el campo username
                $miembroMapper->updateMiembro($miembro, $username);

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
    if(isset($_REQUEST['NOMBRE']) && isset($_REQUEST['APELLIDOS']) && isset($_REQUEST['USUARIO']) && isset($_REQUEST['CONTRASEÑA']) && isset($_REQUEST['CORREO'])){

        $nombre = $_REQUEST['NOMBRE'];
        $apellidos = $_REQUEST['APELLIDOS'];
        $usuario = $_REQUEST['USUARIO'];
        $contraseña = $_REQUEST['CONTRASEÑA'];
        $correo =  $_REQUEST['CORREO'];

        $miembro = new Miembro_Model($nombre, $apellidos, $usuario, $contraseña, $correo);
        $aux = $miembroMapper->buscarMiembroPorUsuario($usuario);
        if($aux != false){ //existe
            echo "Username existente, introduzca otro";
        }else{ //no existe
            $miembroMapper->insertarMiembro($miembro);
        }
    }
    //muestra la vista
    $vista_add = new MiembroAddView();
}

function delete_miembro(){

    $conectado = $_SESSION['login'];
    $miembroMapper = new MiembroMapper();
    $miembroMapper -> desactivarMiembro($conectado);

    new Login();
}

function consultar_miembro(){

}

function showTareasMiembro(){

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

    default:
        consultar_miembro();

}



?>