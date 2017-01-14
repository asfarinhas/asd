<?php

class MIEMBRO_TAREAS_SHOW_Vista{

    private $tareas;

    function __construct($tareas){
        $this->tareas = $tareas;
    }

    function mostrarTareasPadre(){
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
                        <a href="../Views/DEFAULT_Vista.php"><?=$strings['Volver']?> </a>
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
                    if(empty($this -> tareas)){
                            //Vista con mensaje de vacio
                    }else {

                        foreach ($this->tareas as $tarea) {
                            echo "<tr><td> " . $tarea->getNombre() . "</td>";
                            echo "<td>" . $tarea->getMiembro()->getNombre() . "</td>";
                            echo "<td> " . $tarea->getFechaInicioPlan() . "</td>";
                            echo "<td> " . $tarea->getFechaEntregaPlan() . "</td>";
                            echo "<td> " . $tarea->getHorasPlan() . "</td>";

                            //Si es una tarea Padre se muestra boton a subtarea sino no
                            if($tarea -> getTareaPadre() == null) {
                                ?>
                                <td>
                                    <a href="../Controllers/MIEMBRO_Controller.php?ID_TAREA=<?php echo $tarea->getIdTarea(); ?>&accion=verSubtareas"><?php echo $strings['Subtareas']; ?></a>
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
        <?php
    } //fin metodo mostrarTareasPadre
}

?>