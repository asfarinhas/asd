<?php


class Subtarea_add
{

    private $array_datos;

    public function __construct($array_datos)
    {
        $this->array_datos = $array_datos;

    }

    public function getArrayDatos()
    {
        return $this->array_datos;
    }

    public function showView()
    {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        $miembros = $this->getArrayDatos();
        $strings = array();
        //*************************************************************************
        //*************************************************************************************************************
        ?>
        <head>
            <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>

        </head>
        <div>

            <h1><span class="form-title"><?=$strings['InsertarSubtarea']?></h1>


            <form action="../Controllers/TAREA_Controller.php" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">

             <div> <!-- ID de la tarea padre-->
                 <input type="number" hidden name="tarea_padre" value="<?=$_GET['tarea_padre']?>" >
             </div>

             <div> <!-- ID de proyecto-->
                 <input type="number" hidden name="id_proyecto" value="<?=$_GET['id_proyecto']?>" >
             </div>

             <div>
                 <?= $strings['Nombre']?> <br/>
                 <input type="text" name="nombre" placeholder="<?= $strings['Nombre']?>"  id="nombre" required ><br/>
             </div>

            <div>
                <?= $strings['Descripcion']?> <br/>
                <input type="text" name="descripcion" placeholder="<?= $strings['Descripcion']?>"  id="descripcion" required ><br/>
            </div>

            <div>
                <?= $strings['Fechainicioplan']?> <br/>
                <input type="date" name="fecha_inicio_plan" placeholder="dd/mm/aaaa"  id="fecha_inicio_plan" required ><br/>
            </div>

            <div>
                <?= $strings['Fechaentregaplan']?> <br/>
                <input type="date" name="fecha_entrega_plan" placeholder="dd/mm/aaaa"  id="fecha_entrega_plan" required ><br/>
            </div>

            <!-- <div>
                 <?//= $strings['fecha_I_R']?><br/> <!-- AÑADIR A DICCIONARIOS A PARTIR DE AQUI -->
                 <!--<input type="date" name="fecha_inicio_real" placeholder="dd/mm/aaaa"  id="fecha_inicio_real"><br/>
             </div>-->

            <!-- <div>
                 <?//=$strings['fecha_E_R']?><br/>
                 <input type="date" name="fecha_entrega_real" placeholder="dd/mm/aaaa"  id="fecha_entrega_real"><br/>
             </div>-->

             <div>
                 <?=$strings['horas_P']?><br/>
                 <input type="number" name="horas_plan" placeholder="8"  id="horas_plan" required ><br/>
             </div>

            <!--<div>
                <?//=$strings['horas_R']?><br/>
                <input type="number" name="horas_real" placeholder="8"  id="horas_real"><br/>
            </div>-->

            <div>
                <?=$strings['asignado']?>

                <select name="miembro">
                    <?php foreach ($miembros as $miembro): ?>
                        <option value="<?= $miembro->getUsuario() ?>"><?= $miembro->getUsuario() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!--<div>
                <?//=$strings['estado']?>

                <select name="estado_tarea">
                   <option value="pendiente"><?//=$strings['pendiente']?></option>
                   <option value="finalizado"><?//=$strings['finalizado']?></option>
                </select>
            </div>-->

            <div>
                <?=$strings['comentarios']?><br/>
                <textarea type="textarea" name="comentario" rows="4" cols="50"></textarea>
            </div>

            <div>
             <!-- AÑADIR ENLACE A LA VISTA QUE CREA LOS ENTREGABLES -->
              <a href="" ><?=$strings['AddEntregables']?></a><br/>
            </div>

             <input type="hidden"  name="accion" value="add_subtarea">
             <input type='submit' onclick="DoSubmit()" value="<?=$strings['Insertar'] ?>"><br/><br/>
            </form>
            <a class="form-link" href='../Controllers/TAREA_Controller.php'><?=$strings['Volver']?> </a>
        </div>
        <?php
    }
}
?>


