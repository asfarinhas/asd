<?php
/**
 * Created by PhpStorm.
 * User: abhermida
 * Date: 29/12/2016
 * Time: 21:59
 */


    function vistaJefeProyecto($entregable){
?>
            <html>
                <head>
                </head>
                <body>

                <form action="ENTREGABLE_Controller.php" name="formAddEntregable" method="post" onsubmit=" ">

                    <div>
                        <label>Nombre: </label>
                        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $entregable['nombre']; ?>"  id="nombre" required maxlength="15"><br/>
                    </div>

                    <div>
                        <label>Estado: </label>
                        <select required name="estado">
                            <option value=""> ---- Seleccione estado ----- </option>
                            <option <?php if($entregable['estado'] == 0){ echo "selected"; } ?> value="0">Válido</option>
                            <option <?php if($entregable['estado'] == 1){ echo "selected"; } ?> value="1">Erróneo</option>
                            <option <?php if($entregable['estado'] == 2){ echo "selected"; } ?> value="2">Pendiente</option>
                            <option <?php if($entregable['estado'] == 3){ echo "selected"; } ?> value="3">Entregado</option>
                        </select>
                    </div>

                    <div>
                        <label>Url: </label> <br/>
                    </div>

                    <div>
                        <label>ID_MIEMBRO: </label> <br/>
                        <select name="miembro">
                            <?php foreach ($miembros as $miembro): ?>
                                <option <?php if($entregable['id_miembro'] == $miembro['id'] ){ echo selected; } ?> value="<?= $miembro["USUARIO"] ?>"><?= $miembro["NOMBRE"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>FECHASUBIDA: </label><br/>
                    </div>

                    <div>
                        <label>ID_TAREA: </label><br/>
                            <select name="tarea">
                                <?php foreach ($tareas as $tarea): ?>
                                    <option <?php if($entregable['id_tarea'] == tarea['id']){ echo selected; } ?>value="<?= $tarea["USUARIO"] ?>"><?= $tarea["NOMBRE"] ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>

                    <input type="submit" name="accion" value="Añadir"><?//= $strings['Add'] ?>



                 </body>
            </html>
<?php
        }

    function vistaMiembroProyecto(){
    ?>

    <html>
    <head>
    </head>
    <body>

    <form action="ENTREGABLE_Controller.php" name="formAddEntregable" method="post" onsubmit=" ">

        <div>
            <label>Nombre: </label>
            <input readonly type="text" name="nombre" placeholder="Nombre" id="nombre" required><br/>
        </div>

        <div>
            <label>Estado: </label>
            <select required name="estado">
                <option value=""> ---- Seleccione estado -----</option>
                <option value="0">Válido</option>
                <option value="1">Erróneo</option>
                <option value="2">Pendiente</option>
                <option value="3">Entregado</option>
            </select>
        </div>

        <div>
            <label>Url: </label> <br/>
        </div>

        <div>
            <label>ID_MIEMBRO: </label> <br/>
            <select name="miembro">
                <?php foreach ($miembros as $miembro): ?>
                    <option value="<?= $miembro["USUARIO"] ?>"><?= $miembro["NOMBRE"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label>FECHASUBIDA: </label><br/>
        </div>

        <div>
            <label>ID_TAREA: </label><br/>
            <select name="tarea">
                <?php foreach ($tareas as $tarea): ?>
                    <option value="<?= $tarea["USUARIO"] ?>"><?= $tarea["NOMBRE"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" name="accion" value="Añadir"><?//= $strings['Add'] ?>


    </body>
    </html>


<?php
}

?>