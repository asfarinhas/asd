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
        </head>
        <body>

        <form enctype="multipart/form-data" action="ENTREGABLE_Controller.php" name="formAddEntregable" method="post">

            <div>
                <label> <?php echo $strings['Nombre']; ?>:</label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombre" required maxlength="15"><br/>
            </div>

            <div>
                <label><?php echo $strings['Estado']; ?>: </label>
                <select readonly required name="estado">
                    <option value=""> ---- <?php echo $strings['Estado']; ?> -----</option>
                    <option selected value="0"><?php echo $strings['Pendiente']; ?></option>
                </select>
            </div>

            <input type="hidden" name="accion" value="add_entregable">
            <input type="hidden" name="ID_TAREA" value="<?php echo $_REQUEST['ID_TAREA']; ?>">
            <input type="submit" name="submit" value="<?php echo $strings['Insertar'] ?>">
            <a href="../Controllers/ENTREGABLE_Controller.php?accion=showall_entregable&ID_TAREA=<?php echo $_REQUEST['ID_TAREA'];?>" >
                <input type="button" value="<?php echo $strings['Volver']; ?>" />
            </a>
            ?>


        </body>
        </html>


        <?php
    }
}

?>