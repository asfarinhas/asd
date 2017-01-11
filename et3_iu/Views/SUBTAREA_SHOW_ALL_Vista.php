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

    function mostrarSubtareas(){
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
                    </div>
                </nav>
                <table id="btable" border = 1>
                    <thead>
                        <th>  PROYECTO </th>
                        <th>  TAREA </th>
                        <th>  FECHA INICIO PLANIFICADA </th>
                        <th>  FECHA INICIO REAL </th>
                        <th>  ESTADO </th>
                    </thead>

                    <?php
                    if(empty($this -> subtareas)){
                        //Vista con mensaje de vacio
                    }else {

                        foreach ($this->subtareas as $tarea) {
                            echo "<tr><td> " . $tarea->getProyecto()->getNOMBRE() . "</td>";
                            echo "<td>" . $tarea->getNombre() . "</td>";
                            echo "<td> " . $tarea->getFechaInicioPlan() . "</td>";
                            echo "<td> " . $tarea->getFechaInicioReal() . "</td>";
                            echo "<td> " . $tarea->getEstadoTarea() . "</td>";

                            //Si es una tarea Padre se muestra boton a subtarea sino no
                            if($tarea -> getTareaPadre() == null) {
                                ?>
                                <td>
                                    <a href="../Controllers/MIEMBRO_Controller.php?ID_TAREA=<?php echo $tarea->getIdTarea(); ?>&accion=verSubtareas">VerSubtareas</a>
                                </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
        <!--
                            <div id="data">
        <p class="alert alert-warning">No existen tareas.</p>
        </div>
        -->
        <?php
    } //fin metodo mostrarTareasPadre
}

?>