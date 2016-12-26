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
                                    <li><?php echo $strings['Usuario'].": ". $_SESSION['login']; ?></li>

                                </ul>

                                <?php echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>"; ?></li>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Consultar']?>'><?php echo $strings['Consultar']?></a>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Insertar']?>'><?php echo $strings['Insertar']?></a>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['ConsultarBorrados']?>'><?php echo $strings['ConsultarBorrados']?></a>
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
                            foreach($this->datos as $proyecto){
                                echo "<tr><td> " . $proyecto['NOMBRE']."</td>";
                                echo "<td>" . $proyecto[9]->getNombre()."</td>";
                                echo "<td> " . $proyecto['FECHAI']."</td>";
                                echo "<td> " . $proyecto['FECHAE']."</td>";
                                echo "<td> " . $proyecto['NUMEROHORAS']."</td>";

        ?>


                            <td>
                                <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $proyecto['ID_PROYECTO'] . '&accion='.$strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
                            </td>
                            <td>
                                <a href='PROYECTO_Controller.php?PROYECTO_NOMBRE=<?php echo $proyecto['NOMBRE'] . '&accion='.$strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                            </td>
                            <td>
                                <a href='PROYECTO_Controller.php?PROYECTO_NOMBRE=<?php echo $proyecto['NOMBRE'] . '&accion='.$strings['Ver']; ?>'><?php echo $strings['Ver'] ?></a>
                            </td>
                                <td>
                                    <a href='PROYECTO_Controller.php?PROYECTO_NOMBRE=<?php echo $proyecto['NOMBRE'] . '&accion='.$strings['Gestionar Miembros']; ?>'><?php echo $strings['Gestionar Miembros'] ?></a>
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

