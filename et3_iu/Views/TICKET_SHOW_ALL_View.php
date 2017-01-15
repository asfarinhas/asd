<?php

class TICKET_Default{
    //VISTA PARA LISTAR TICKETS

    private $datos;
    private $volver;



    function __construct($array, $volver){
    $this->datos = $array;
    $this->volver = $volver;
    $this->render();


    }



    function render(){
        ?>

        <p>
            <h2>
                <div>
                    <head><link rel="stylesheet" href="../../../../../Users/Ismael/Downloads/ET3_Grupo4-master/et3_iu/Styles/styles.css" type="text/css" media="screen" />
                        <?php   include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
                    </head>
                    <div id="wrapper">
                        <nav>
                            <div class="menu">
                                <ul>
                                    <li><a href="../../../../../Users/Ismael/Downloads/ET3_Grupo4-master/et3_iu/Functions/Desconectar.php"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                                    <li><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></li>

                                </ul>

                                <?php echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>"; ?></li>
                                <a href='./TICKET_Controller.php?accion=<?php echo $strings['Consultar']?>'><?php echo $strings['Consultar']?></a>
                                <a href='./TICKET_Controller.php?accion=<?php echo $strings['Insertar']?>'><?php echo $strings['Insertar']?></a>
                                <a href='./TICKET_Controller.php?accion=<?php echo $strings['ConsultarBorrados']?>'><?php echo $strings['ConsultarBorrados']?></a>
                            </div>
                        </nav>
                        <table id="btable" border = 1>
                            <tr>
                                <th>  <?=$strings['NOMBRE'] ?> </th>
                                <th>  <?=$strings['ID_TICKET'] ?> </th>

                                <th>  'NOMBRE_PROYECTO' </th>
                                <th>  <?=$strings['FECHAI'] ?> </th>
                                <th>  <?=$strings['FECHAE'] ?> </th>
                                <th>  <?=$strings['NUMEROHORAS'] ?> </th>
                                <th>  BORRADO</th>





                            </tr>
                            <?php
                            foreach($this->datos as $TICKET){
                                echo "<tr><td> " . $TICKET['NOMBRE']."</td>";
                                echo "<td> " . $TICKET['ID_TICKET']."</td>";
                                echo "<td> " . $TICKET['ID_PROYECTO']."</td>";
                                echo "<td> " . $TICKET['FECHAI']."</td>";
                                echo "<td> " . $TICKET['NUMEROHORAS']."</td>";
                                echo "<td> " . $TICKET['BORRADO']."</td>";






                            ?>


                            <td>
                                <a href='TICKET_Controller.php?ID_TICKET=<?php echo $TICKET['ID_TICKET'] . '&accion='.$strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
                            </td>
                            <td>
                                <a href='TICKET_Controller.php?ID_TICKET=<?php echo $TICKET['ID_TICKET'] . '&accion='.$strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                            </td>
                            <td>
                                <a href='TICKET_Controller.php?ID_TICKET=<?php echo $TICKET['ID_TICKET'] . '&accion='.$strings['Ver']; ?>'><?php echo $strings['Ver'] ?></a>
                            </td>

                            </tr>
    <?php                        }
                            ?>
                        </table>

                    </div>
                    <h3>
        <p>
            <?php
            echo '<a class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
            ?>
            </h3>
        </p>

        </div>

        <?php
    } //fin metodo render

}
