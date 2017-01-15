<?php

class ProyectoMiembro_Default{
    //VISTA PARA LISTAR MIEMBROS DE PROYECTO

    private $datos1;
    private $volver;
    private $proyectoId;

    function __construct($array1,$proyectoId, $volver){
        $this->datos1 = $array1;
        $this->proyectoId = $proyectoId;
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
                                <title><?php echo $strings['Gestionar Miembros Proyecto'];?></title>
                                <?php echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>"; ?></li>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Consultar Miembro']?>'><?php echo $strings['Consultar Miembro']?></a>
                                <a href='./PROYECTO_Controller.php?accion=<?php echo $strings['Insertar Miembro'] ?>&ID_PROYECTO=<?php echo $this->proyectoId;?>'><?php echo $strings['Insertar Miembro']?></a>
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
                            foreach($this->datos1 as $miembro){
                                echo "<tr><td> " . $miembro->getNombre() ."</td>";
                                echo "<td>" . $miembro->getApellidos() ."</td>";
                                echo "<td> " . $miembro->getCorreo() ."</td>";
                                echo "<td> " . $miembro->getUsuario() ."</td>";

                                if(strcmp($miembro->getUsuario(), $_SESSION['login']) != 0){?>

                                <td>
                                    <a href='PROYECTO_Controller.php?ID_PROYECTO=<?php echo $_REQUEST['ID_PROYECTO'] . '&ID_MIEMBRO=' . $miembro->getUsuario(). '&accion='.$strings['Eliminar Miembros']; ?>'><?php echo $strings['Borrar'] ?></a>
                                </td>
                                <td>
                                    <a href='PROYECTO_Controller.php?ID_MIEMBRO=<?php echo $miembro->getUsuario() . '&accion='.$strings['Ver Miembro']; ?>'><?php echo $strings['Ver'] ?></a>
                                </td>

                                </tr>
                            <?php         }               }
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

