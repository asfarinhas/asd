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


if (!IsAuthenticated()){
    header('Location:../index.php');
}

//obtener los datos del formulario
function get_data_form(){

    $NOMBRE = $_REQUEST['NOMBRE'];
    $APELLIDOS = $_REQUEST['APELLLIDOS'];
   // $APELLIDO2 = $_REQUEST('APELIDO2');
    $USUARIO = $_REQUEST['USUARIO'];
    $CONTRASEÑA = $_REQUEST['CONTRASEÑA'];
    $CORREO = $_REQUEST['CORREO'];


    $toret = new Miembro_Model($NOMBRE, $APELLIDOS, $USUARIO, $CONTRASEÑA, $CORREO);
    return $toret;
}

function add_miembro(){
    $miembro = get_data_form();
    $miembroMapper = new MiembroMapper();
    if($miembro->getUsuario()!=null){

        $aux = $miembroMapper->buscarMiembroPorUsuario($miembro->getUsuario());
        if($aux != NULL){ //existe
            echo "Username existente, introduzca otro";
        }else{
            $miembroMapper->insertarMiembro($miembro);
        }

    }else{
        //redirigir la vista alta miembro(registro)

    }

}
function edit_miembro(){
    $username = $_SESSION['login'];
    $miembro = get_data_form();
    $miembroMapper = new MiembroMapper();
    if($username != $miembro->getUsuario()){
        //comprobar que no existe el usuario en la bd
        $aux = $miembroMapper->buscarMiembroPorUsuario($miembro->getUsuario());
        if($aux != NULL){ //existe
            echo "Username existente, introduzca otro";
        }else{
            $miembroMapper->updateMiembro($miembro, $username);
        }

    }else{
        $miembroMapper->updateMiembro($miembro, $username);

    }

}

if (!isset($_REQUEST['accion'])){
    $accion = '';
}else{
    $accion = $_REQUEST['accion'];
}


switch ($accion) {
    case "add":
        add_miembro();
        break;

    case "edit":
        edit_miembro();
        break;

    case "delete":
        break;

    case "showcurrent":
        break;

    case "showAll":
        break;

    default:
        echo "mostrar vista principal";

}



?>