<?php
//include '../Models/MIEMBRO_Model.php';
/**
 * Created by PhpStorm.
 * User: Claudia
 * Date: 28/12/2016
 * Time: 17:12
 */
class MiembroEditView{

    private $datos;

    function __construct($datos)
    {
        $this->datos = $datos;
    }


    public function getDatos()
    {
        return $this->datos;
    }

    function showView(){

        $miembro = $this->getDatos();
        //$strings = array();
        $idioma = $_SESSION['IDIOMA'];
        switch ($idioma){
            case "Castellano":
                include '../Locates/Strings_Castellano.php';
                break;
            case "English":
                include '../Locates/Strings_English.php';
                break;
            case "Galego":
                include '../Locates/Strings_Galego.php';
            default:
                include '../Locates/Strings_Castellano.php';
        }

        /*include '../js/md5.js';
        include '../js/sweetalert.min.js';
        include '../js/tcal.js';
        include '../js/validaciones.js';*/


        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
            <link href="../Styles/sweetalert.css" rel="stylesheet">
            <script src="../js/sweetalert.min.js"></script>
            <script src="../js/validaciones.js"></script>
            <script src="../js/md5.js"></script>
            <link href="../Styles/tcal.css" rel="stylesheet">
            <script src="../js/tcal.js"></script>

        </head>
        <div>
            <h1><span class="form-title"><?=$strings['ModificarMiembro']?></h1>

            <form action="../Controllers/MIEMBRO_Controller.php" name="formEditMiembro" enctype="multipart/form-data" method="post" onsubmit="validarFormEditMiembro()">


                <div>
                    <?= $strings['Nombre']?> <br/>
                    <input type="text" name="nombre" value="<?= $miembro->getNombre()?>" placeholder="<?= $strings['Nombre']?>"  id="nombre"  onblur="validarCampo(document.formEditMiembro.nombre);validarNombre(document.formEditMiembro.nombre);evitarProhibidos(document.formEditMiembro.nombre)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_APELLIDO']?> <br/>
                    <input type="text" name="apellidos" value="<?= $miembro->getApellidos()?>" placeholder="<?= $strings['EMP_APELLIDO']?>"  id="apellidos"  onblur="validarCampo(document.formEditMiembro.apellidos);validarApellidos(document.formEditMiembro.apellidos);evitarProhibidos(document.formEditMiembro.apellidos)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_USER']?> <br/>
                    <input type="text" name="usuario" value="<?= $miembro->getUsuario()?>" placeholder="<?= $strings['EMP_USER']?>"  id="usuario"  onblur="validarCampo(document.formEditMiembro.usuario);validarUsuario(document.formEditMiembro.usuario);evitarProhibidos(document.formEditMiembro.usuario)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_PASSWORD']?> <br/>
                    <input type="password" name="password" value="<?=$miembro->getContraseña()?>" placeholder="<?= $strings['EMP_PASSWORD']?>"  id="password"  onblur="validarCampo(document.formEditMiembro.password);validarPassword(document.formEditMiembro.password)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_EMAIL']?> <br/>
                    <input type="email" name="correo" value="<?= $miembro->getCorreo()?>" placeholder="ej: aaaa@aaaa.aa"  id="correo"  onblur="validarCampo(document.formEditMiembro.correo);validarEmail(document.formEditMiembro.correo);evitarProhibidos(document.formEditMiembro.correo)"><br/>
                </div>

                <input type="hidden"  name="accion" value="edit">
                <input type='submit' name="submit" value="<?=$strings['Modificar'] ?>"><br/><br/>
            </form>
            <a class="form-link" href='../Controllers/MIEMBRO_Controller.php'><?=$strings['Volver']?> </a>
        </div>
  <?php
    }
}

?>