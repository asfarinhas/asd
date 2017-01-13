<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 04/01/2017
 * Time: 20:56
 */

class SUBTAREA_SHOW_ALL_Vista{

    private $subtareas;

    function __construct($subtareas){
        $this->subtareas = $subtareas;
    }

    /**
     * @return mixed
     */
    public function getSubtareas()
    {
        return $this->subtareas;
    }


    function mostrarSubtareas(){

        $subtareas = $this -> getSubtareas();
        ?>


        <div>
            <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
                <?php   include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
            </head>

            <div id="wrapper">
                <nav>
                    <div class="menu">
                        <ul>
                            <li><a href="../Functions/Desconectar.php"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                            <li><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></li>
                        </ul>
                        <a href="../Views/DEFAULT_Vista.php">Volver </a>
                        <a href='./TAREA_Controller.php?accion=add_subtarea&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>&amp;tarea_padre=<?=$_REQUEST['ID_TAREA']?>'> <?php echo $strings['Insertar']?></a>
                    </div>
                </nav>
                <table id="btable" border = 1>
                    <thead>
                        <th>  PROYECTO </th>
                        <th>  SUBTAREA </th>
                        <th>  FECHA INICIO PLANIFICADA </th>
                        <th>  FECHA INICIO REAL </th>
                        <th>  ESTADO </th>
                    </thead>

                    <?php
                    if(empty($this -> subtareas)){
                        //Vista con mensaje de vacio
                    }else {

                        foreach ($subtareas as $tarea) {
                            echo "<tr><td> " . $tarea->getProyecto()->getNOMBRE() . "</td>";
                            echo "<td>" . $tarea->getNombre() . "</td>";
                            echo "<td> " . $tarea->getFechaInicioPlan() . "</td>";
                            echo "<td> " . $tarea->getFechaInicioReal() . "</td>";
                            echo "<td> " . $tarea->getEstadoTarea() . "</td>";
                            ?>
                            <td>
                                <a href='TAREA_Controller.php?accion=edit_subtarea&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>'><?php echo $strings['Modificar'] ?></a>
                            </td>
                            <td>
                                <a href='TAREA_Controller.php?accion=delete_subtarea&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>'><?php echo $strings['Borrar'] ?></a>
                            </td>
                            <td>
                                <a href='TAREA_Controller.php?accion=show_subtarea&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>&amp;proyecto_id=<?=$_REQUEST['proyecto_id']?>'><?php echo $strings['Ver'] ?></a>
                            </td>
                            <td>
                                <a href='ENTREGABLE_Controller.php?accion=showall&amp;ID_TAREA=<?php echo $tarea->getIdTarea()?>'><?php echo $strings['Entregables'] ?></a>
                            </td>

                            <?php
                        }
                    }
                    ?>
                </table>
            </div>

        </div>

        <?php
    }


    //fin metodo mostrarSubtareas
}

?>