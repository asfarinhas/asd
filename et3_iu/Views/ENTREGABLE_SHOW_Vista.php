<?php

/**
 * Created by PhpStorm.
 * User: Ismael
 * Date: 30/12/2016
 * Time: 18:40
 */
class ENTEGABLE_SHOW_Vista
{
    public function __construct(array $entregables, $volver)
    {
        $this->volver = $volver;
        $this->entregables = $entregables;
        $this->render();

    }

    public function render()    {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        ?>
        <div>
            <head>
                <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>
                <link rel="stylesheet" type="text/css" href="../Styles/print.css" media="print"/>
            </head>
            <div id="wrapper">
                <nav>
                    <div class="menu">
                        <ul>
                            <li><a href="../Functions/Desconectar.php"><?php echo $strings['Cerrar Sesión']; ?></a></li>
                            <li><?php echo $strings['Usuario'] . ": " . $_SESSION['login']; ?></li>
                        </ul>
                         <?= '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>" ?>
                        <a href='./ENTREGABLE_Controller.php?accion=add_entregable_menu'><?php echo $strings['Insertar'] ?></a>
                    </div>
                </nav>
                <table id='btable' border=1>
                    <tr>
                        <th><?= $strings["Entregable_id"] ?></th>
                        <th><?= $strings["Nombre"] ?></th>
                        <th><?= $strings["Estado"] ?></th>
                        <th><?= $strings["url"] ?></th>
                        <th><?= $strings["Realizado Por"] ?></th>
                        <th><?= $strings["Fecha"] ?></th>
                    </tr>
                    <?php
                    foreach ($this->entregables as $entregable) { ?>
                        <tr>
                            <td><?=$entregable->getID()?></td>
                            <td><?=$entregable->getNombre()?></td>
                            <td><?=$entregable->getEstado()?></td>
                            <td><?=$entregable->getURL()?></td>
                            <td><?=$entregable->getMiembro()->getUsuario()?></td>
                            <td><?=$entregable->getFecha()->format("d/m/Y")?></td>
                            <td><a href='ENTREGABLE_Controller.php?accion=edit_entregable_menu&amp;entregable_ID=<?= $entregable->getID() ?>'><?= $strings['Modificar'] ?></a></td>
                            <td><a href='ENTREGABLE_Controller.php?accion=delete_entregable_menu&amp;entregable_ID=<?= $entregable->getID() ?>'><?= $strings['Borrar'] ?></a></td>
                        </tr>
                       <?php } ?>

                </table>
            </div> <!-- fin de div de muestra de datos -->
            <h3><?= '<a class="form-link" href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>" ?></h3>
        </div>
        <?php
    } //fin metodo render
}

?>