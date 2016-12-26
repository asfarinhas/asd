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

    $NOMBRE = $_REQUEST('NOMBRE');
    $APELIDO1 = $_REQUEST('APELIDO1');
    $APELLIDO2 = $_REQUEST('APELIDO2');
    $USUARIO = $_REQUEST('USUARIO');
    $CONTRASEÑA = $_REQUEST('CONTRASEÑA');
    $CORREO = $_REQUEST('CORREO');

    $accion = $_REQUEST('accion');

    //$DNI=NULL, $NOMBRE=NULL, $APELLIDO1=NULL, $APELLIDO2=NULL, $USUARIO=NULL, $CONTRASEÑA=NULL, $CORREO=NULL)
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

switch ($_REQUEST['accion']) {

}

?>