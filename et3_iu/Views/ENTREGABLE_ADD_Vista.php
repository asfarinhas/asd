<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 29/12/2016
 * Time: 15:48
 */

//include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

class ENTREGABLE_ADD_Vista
{


    public function __construct($miembros, $tareas)
    {

    }

    public function render()
    {
        ?>

        <html>
        <head>
        </head>
        <body>

        <form action="ENTREGABLE_Controller.php" name="formAddEntregable" method="post" onsubmit=" ">

            <div>
                <label>Nombre: </label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombre" required maxlength="15"><br/>
            </div>

            <div>
                <label>Estado: </label>
                <select required name="estado">
                    <option value=""> ---- Seleccione estado -----</option>
                    <option value="0">Válido</option>
                    <option value="1">Erróneo</option>
                    <option selected value="2">Pendiente</option> <!-- Por defecto -->
                    <option value="3">Entregado</option>
                </select>
            </div>

            <div>
                <label>ID_MIEMBRO: </label> <br/>
                <select required name="miembro">
                    <option value=""> ---- Seleccione miembro -----</option>
                    <?php foreach ($miembros as $miembro): ?>
                        <option value="<?= $miembro["USUARIO"] ?>"><?= $miembro["NOMBRE"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label>ID_TAREA: </label><br/>
                <select required name="tarea">
                    <option value=""> ---- Seleccione tarea -----</option>
                    <?php foreach ($tareas as $tarea): ?>
                        <option value="<?= $tarea["id_tarea"] ?>"><?= $tarea["nombre"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <input type="submit" name="accion" value="AñadirEntregable"><? //= $strings['Add']
            ?>


        </body>
        </html>


        <?php
    }
}

?>