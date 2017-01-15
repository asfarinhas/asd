<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 29/12/2016
 * Time: 21:59
 */

class ENTREGABLE_EDIT_Vista
{

    function __construct($entregable)
    {
        $this->vistaJefeProyecto($entregable);
    }

    function vistaJefeProyecto($entregable)
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
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
        </head>
        <body>
        <div>
            <h1><span class="form-title"><?=$strings['Modificar Entregable']?></h1>

        <form enctype="multipart/form-data" action="ENTREGABLE_Controller.php" name="formAddEntregable" method="post">

            <ul class="form-style-1">
            <div>
                <label><?php echo $strings['Nombre']; ?>:</label>
                <input type="text" name="nombre" value="<?php echo $entregable -> getNOMBRE(); ?>" id="nombre" required
                       maxlength="20"><br/>
            </div>

            <div>
                <label><?php echo $strings['Estado']; ?>:</label>
                <select required name="estado">
                    <option <?php if($entregable -> getEstado() == "pendiente"){ echo "selected"; }?> value="pendiente"><?php echo $strings['pendiente']; ?></option>
                    <option <?php if($entregable -> getEstado() == "entregado"){ echo "selected"; }?> value="entregado"> <?php echo $strings['entregado']; ?></option>
                </select>
            </div>

            <div>
                <label><?php echo $strings['Archivo']; ?>:</label>
                <input name="archivo" required type="file" id="archivo" accept=".doc, .pdf, .docx"/>
            </div>

            <input type="hidden" name="entregable_ID" value="<?php echo $entregable->getID();?>">
            <input type="hidden" name="accion" value="edit_entregable">
            <input type="hidden" name="ID_TAREA" value="<?php echo $entregable->getTarea()->getIdTarea(); ?>">
            <input type="submit" name="submit" value="<?php echo $strings['Modificar'] ?>">


            <a href="../Controllers/ENTREGABLE_Controller.php?accion=showall_entregable&ID_TAREA=<?php echo $entregable -> getTarea() -> getIdTarea();?>" >
                <input type="button" value="<?php echo $strings['Volver']; ?>" />

            </a>
            </ul>
        </form>
        </div>
        </body>
        </html>
        <?php
    }
}
?>