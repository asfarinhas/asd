<?php

class ProyectoMiembro_Default{
    //VISTA PARA LISTAR MIEMBROS DE PROYECTO

    private $datos1;
    private $datos2;
    private $volver;

    function __construct($array1, $array2, $volver){
        $this->datos1 = $array1;
        $this->datos2 = $array2;
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
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Consultar Miembro']?>'><?php echo $strings['Consultar Miembro']?></a>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Insertar Miembro']?>'><?php echo $strings['Insertar Miembro']?></a>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['ConsultarBorrados']?>'><?php echo $strings['ConsultarBorrados']?></a>
                            </div>
                        </nav>
                        <table id="btable" border = 1>
                            <tr>
                                <th>  <?=$strings['NOMBRE'] ?> </th>
                                <th>  <?=$strings['APELLIDOS'] ?> </th>
                                <th>  <?=$strings['EMAIL'] ?> </th>
                                <th>  <?=$strings['USUARIO'] ?> </th>

                            </tr>
                            <?php
                            foreach($this->datos2 as $miembro){
                                echo "<tr><td> " . $miembro['EMP_NOMBRE']."</td>";
                                echo "<td>" . $miembro['EMP_APELLIDO'] ."</td>";
                                echo "<td> " . $miembro['EMP_EMAIL']."</td>";
                                echo "<td> " . $miembro['EMP_USER']."</td>";
                                ?>

                                <td>
                                    <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $proyecto['ID_PROYECTO'] . '&accion='.$strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                                </td>
                                <td>
                                    <a href='MIEMBRO_Controller.php?PROYECTO_NOMBRE=<?php echo $proyecto['NOMBRE'] . '&accion='.$strings['Ver']; ?>'><?php echo $strings['Ver'] ?></a>
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

