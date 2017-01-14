<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 3/1/17
 * Time: 12:48
 */

class TareaShowAllVista{

    private $array;

    public function __construct($array){
        $this->array = $array;
    }

    /**
     * @return mixed
     */
    public function getArray()
    {
        return $this->array;
    }


    public function showAll(){
        $arrayTareas = $this->getArray();
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
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
        </head>
            <div id="wrapper">
                <nav>
                    <div class="menu">
                        <ul>
                            <li><a href="../Functions/Desconectar.php"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                            <li><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></li>

                        </ul>
                        <title><?php echo $strings['Mostrar Tareas'];?></title>
                        <a href="../Controllers/PROYECTO_Controller.php?"><?=$strings['Volver']?> </a>
                        <a href='./TAREA_Controller.php?accion=add_tarea&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>'><?php echo $strings['Insertar']?></a>
                    </div>
                </nav>
                <table id="btable" border = 1>
                    <tr>
                        <th>  <?=$strings['NOMBRE'] ?> </th>
                        <th>  <?=$strings['asignado'] ?> </th>
                        <th>  <?=$strings['fecha_I_P'] ?> </th>
                        <th>  <?=$strings['fecha_E_P'] ?> </th>
                        <th>  <?=$strings['horas_P'] ?> </th>
                    </tr>
                    <?php
                    foreach($arrayTareas as $tarea){?>
                        <tr>
                            <td> <?=$tarea->getNombre()?> </td>
                            <td> <?=$tarea->getMiembro()->getUsuario() ?> </td>
                            <td> <?=$tarea->getFechaInicioPlan()?> </td>
                            <td> <?=$tarea->getFechaEntregaPlan()?> </td>
                            <td> <?=$tarea->getHorasPlan()?> </td>
                            <td>
                                <a href='TAREA_Controller.php?accion=edit_tarea&amp;tarea_id=<?php echo $tarea->getIdTarea()?>&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>'><?php echo $strings['Modificar'] ?></a>
                            </td>
                            <td>
                                <a href='TAREA_Controller.php?accion=delete_tarea&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>'><?php echo $strings['Borrar'] ?></a>
                            </td>
                            <td>
                                <a href='TAREA_Controller.php?accion=show_tarea&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>'><?php echo $strings['Ver'] ?></a>
                            </td>
                            <td>
                                <a href='ENTREGABLE_Controller.php?accion=showall&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>'><?php echo $strings['Entregables'] ?></a>
                            </td>
                            <td>
                                <a href='TAREA_Controller.php?accion=showall_subtarea&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>'><?php echo $strings['Subtareas'] ?></a>
                            </td>
                        </tr>
                    <?php                        }
                    ?>

                </table>

            </div>


        <?php
    }


}
?>