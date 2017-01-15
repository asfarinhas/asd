<?php

class Proyecto_Default{
    //VISTA PARA LISTAR PROYECTOS

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
                    <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
                        <?php   include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php'; ?>
                    </head>
                    <div id="wrapper">
                        <nav>
                            <div class="menu">
                                <ul>
                                    <li><a href="../Functions/Desconectar.php"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                                    <li><a href='../Controllers/MIEMBRO_Controller.php'><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></a></li>

                                </ul>
                                <title><?php echo $strings['Gestionar Proyectos'];?></title>
                                <?php echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>"; ?></li>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Consultar']?>'><?php echo $strings['Consultar']?></a>
                                <?php if($_REQUEST['accion']!=$strings['ConsultarBorrados']){ ?>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Insertar']?>'><?php echo $strings['Insertar']?></a>
                                <?php } ?>
                                <?php if($_REQUEST['accion']!=$strings['ConsultarBorrados']){ ?>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['ConsultarBorrados']?>'><?php echo $strings['ConsultarBorrados']?></a>
                                <?php } ?>
                            </div>
                        </nav>
                        <table id="btable" border = 1>
                            <tr>
                                <th>  <?=$strings['NOMBRE'] ?> </th>
                                <th>  <?=$strings['DIRECTOR'] ?> </th>
                                <th>  <?=$strings['FECHAI'] ?> </th>
                                <th>  <?=$strings['FECHAE'] ?> </th>
                                <th>  <?=$strings['NUMEROHORAS'] ?> </th>
                            </tr>
                            <?php
                            foreach($this->datos as $proyecto) {
                                if (strcmp($proyecto->getDIRECTOR()->getUSUARIO(), $_SESSION['login']) == 0 || strcmp('ADMIN', $_SESSION['login']) == 0) {
                                    echo "<tr><td> " . $proyecto->getNOMBRE() . "</td>";
                                    echo "<td>" . $proyecto->getDIRECTOR()->getUSUARIO() . "</td>";
                                    echo "<td> " . $proyecto->getFECHAI() . "</td>";
                                    echo "<td> " . $proyecto->getFECHAE() . "</td>";
                                    echo "<td> " . $proyecto->getNUMEROHORAS() . "</td>";

                                    ?>


                                    <td>
                                        <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $proyecto->getIDPROYECTO() . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
                                    </td>
                                    <?php if($proyecto->getBORRADO() != 1){ ?>
                                    <td>
                                        <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $proyecto->getIDPROYECTO() . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                                    </td>
                                        <?php } ?>
                                    <td>
                                        <a href='PROYECTO_Controller.php?PROYECTO_NOMBRE=<?php echo $proyecto->getNOMBRE() . '&accion=' . $strings['Ver']; ?>'><?php echo $strings['Ver'] ?></a>
                                    </td>
                                    <td>
                                        <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $proyecto->getIDPROYECTO() . '&accion=' . $strings['Gestionar Miembros']; ?>'><?php echo $strings['Gestionar Miembros'] ?></a>
                                    </td>
                                    <td>
                                        <a href='TAREA_Controller.php?proyecto_id=<?php echo $proyecto->getIDPROYECTO() . '&accion='; ?>showall_tarea'><?php echo $strings['Tareas'] ?></a>
                                    </td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </table>
                        <?php
                        echo '<a class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
                        ?>
                    </div>

                    <h3>
        <p>

            </h3>
        </p>

        </div>

        <?php
    } //fin metodo render

}

