<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 1/1/17
 * Time: 13:28
 */


class MiembroAddVista{

    function __construct(){
        $this->showView();
    }


    function showView(){
        ?>


        <?php

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
            <h1><span class="form-title"><?=$strings['Registro']?></h1>
            <ul class="form-style-1">
            <form action="../Controllers/MIEMBRO_Controller.php" name="formAddMiembro" enctype="multipart/form-data" method="post" onsubmit=" return validarFormAddMiembro()">


                <div>
                    <?= $strings['Nombre']?> <br/>
                    <input type="text" name="nombre" placeholder="<?= $strings['Nombre']?>"  id="nombre"   onblur="validarNombre(document.formAddMiembro.nombre)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_APELLIDO']?> <br/>
                    <input type="text" name="apellidos" placeholder="<?= $strings['EMP_APELLIDO']?>"  id="apellidos" required onblur="validarApellidos(document.formAddMiembro.apellidos)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_USER']?> <br/>
                    <input type="text" name="usuario" placeholder="<?= $strings['EMP_USER']?>"  id="usuario" required onblur="validarUsuario(document.formAddMiembro.usuario)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_PASSWORD']?> <br/>
                    <input type="password" name="password" placeholder="<?= $strings['EMP_PASSWORD']?>"  id="password" required onblur="validarCampo(document.formAddMiembro.password);validarPassword(document.formAddMiembro.password)"><br/>
                </div>

                <div>
                    <?= $strings['EMP_EMAIL']?> <br/>
                    <input type="email" name="correo" placeholder="ej: aaaa@aaaa.aa"  id="correo" required onblur="validarCampo(document.formAddMiembro.correo);validarEmail(document.formAddMiembro.correo)"><br/>
                </div>

                <input type="hidden"  name="accion" value="add">
                <input type='submit' onclick="DoSubmit()" value="<?=$strings['Registro'] ?>"><br/><br/>
            </form>
            </ul>
            <a class="form-link" href='../Controllers/MIEMBRO_Controller.php'><?=$strings['Volver']?> </a>
        </div>
        <?php
    }
}