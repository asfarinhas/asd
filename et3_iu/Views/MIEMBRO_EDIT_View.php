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


        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>

        </head>
        <div>
            <h1><span class="form-title"><?=$strings['ModificarMiembro']?></h1>

            <form action="../Controllers/MIEMBRO_Controller.php" name="formEditMiembro" enctype="multipart/form-data" method="post" onsubmit=" ">


                <div>
                    <?= $strings['Nombre']?> <br/>
                    <input type="text" name="nombre" value="<?= $miembro->getNombre()?>" placeholder="<?= $strings['Nombre']?>"  id="nombre" required ><br/>
                </div>

                <div>
                    <?= $strings['EMP_APELLIDO']?> <br/>
                    <input type="text" name="apellidos" value="<?= $miembro->getApellidos()?>" placeholder="<?= $strings['EMP_APELLIDO']?>"  id="apellidos" required ><br/>
                </div>

                <div>
                    <?= $strings['EMP_USER']?> <br/>
                    <input type="text" name="usuario" value="<?= $miembro->getUsuario()?>" placeholder="<?= $strings['EMP_USER']?>"  id="usuario" required ><br/>
                </div>

                <div>
                    <?= $strings['EMP_PASSWORD']?> <br/>
                    <input type="password" name="password" value="<?=$miembro->getContraseña()?>" placeholder="<?= $strings['EMP_PASSWORD']?>"  id="password" required ><br/>
                </div>

                <div>
                    <?= $strings['EMP_EMAIL']?> <br/>
                    <input type="email" name="correo" value="<?= $miembro->getCorreo()?>" placeholder="ej: aaaa@aaaa.aa"  id="correo" required ><br/>
                </div>

                <input type="hidden"  name="accion" value="edit">
                <input type='submit' onclick="DoSubmit()" value="<?=$strings['Modificar'] ?>"><br/><br/>
            </form>
            <a class="form-link" href='../Controllers/MIEMBRO_Controller.php'><?=$strings['Volver']?> </a>
        </div>
  <?php
    }
}

?>