<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 29/12/2016
 * Time: 15:48
 */

//include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

class ENTREGABLE_ADD_Vista
{


    public function __construct()
    {
        $this ->render();
    }

    public function render()
    {
        $idioma = $_SESSION['IDIOMA'];
        switch ($idioma) {
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

        <html>

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
            <h1><span class="form-title"><?=$strings['Insertar Entregable']?></h1>

        <form enctype="multipart/form-data" action="ENTREGABLE_Controller.php" name="formAddEntregable" method="post" onsubmit=" return validarFormAddEntregable()">
            <ul class="form-style-1">
            <div>
                <label> <?php echo $strings['Nombre']; ?>:</label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombre" required maxlength="20" onblur="validarNombreEntregable(document.formAddEntregable.nombre)"><br/>
            </div>

            <div>
                <label><?php echo $strings['Estado']; ?>: </label>
                <select readonly required name="estado">
                    <option selected value="pendiente"><?php echo $strings['pendiente']; ?></option>
                </select>
            </div>

            <input type="hidden" name="accion" value="add_entregable">
            <input type="hidden" name="ID_TAREA" value="<?php echo $_REQUEST['ID_TAREA']; ?>">
            <input type="submit" name="submit" onclick="validarFormAddEntregable()" value="<?php echo $strings['Insertar'] ?>">


            <a href="../Controllers/ENTREGABLE_Controller.php?accion=showall_entregable&ID_TAREA=<?php echo $_REQUEST['ID_TAREA'];?>" >
                <input type="button" value="<?php echo $strings['Volver']; ?>" />
            </a>
            </ul>
        </form>
        </div>

        </html>


        <?php
    }
}

?>