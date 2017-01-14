<?php
/**
 * Created by PhpStorm.
 * User: Claudia
 * Date: 26/12/2016
 * Time: 19:55
 */

class Subtarea_edit{

    private $array_datos;
    private $array_miembros;


    public function __construct($array_datos, $array_miembros, $volver)
    {
        $this->array_datos = $array_datos;
        $this->array_miembros = $array_miembros;
        $this->volver = $volver;
    }

    public function getArrayDatos()
    {
        return $this->array_datos;
    }

    public function getMiembros()
    {
        return $this->array_miembros;
    }


    //CONSTRUYE LA VISTA
    public function showView()
    {
    $datos = $this->getArrayDatos();    //datos de la subtarea

    $miembros = $this->getMiembros();
    $tareapadre = $datos->getTareaPadre();
    $proyecto = $datos->getProyecto();
    $strings = array();
    //var_dump($datos->getMiembro());

    $idioma = $_SESSION['IDIOMA'];
    switch ($idioma) {
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
<head>
    <link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen"/>

</head>
<div>

    <h1><span class="form-title"><?=$strings['ModificarSubtarea']?></h1>

    <form action="../Controllers/TAREA_Controller.php" name="formAddSubtarea" enctype="multipart/form-data" method="post" onsubmit=" ">
        <ul class="form-style-1">
        <div> <!-- ID de la tarea padre-->
            <input type="number" hidden name="ID_TAREA" value="<?=$_REQUEST['ID_TAREA']?>" >
        </div>

        <div> <!-- ID de la tarea padre-->
            <input type="number" hidden name="tarea_padre" value="<?=$tareapadre->getIdTarea()?>" >
        </div>

        <div> <!-- ID de proyecto-->
            <input type="number" hidden name="proyecto_id" value="<?=$_REQUEST['proyecto_id']?>" >
        </div>

        <div>
            <?= $strings['Nombre']?> <br/>
            <input type="text" name="nombre" value="<?= $datos->getNombre()?>" placeholder="<?= $strings['Nombre']?>"  id="nombre" required ><br/>
        </div>

        <div>
            <?= $strings['Descripcion']?> <br/>
            <input type="text" name="descripcion" value="<?= $datos->getDescripcion()?>" placeholder="<?= $strings['Descripcion']?>"  id="descripcion" required ><br/>
        </div>

        <div>
            <?= $strings['Fechainicioplan']?> <br/>
            <input type="date" name="fecha_inicio_plan" value="<?= $datos->getFechaInicioPlan()?>" placeholder="dd/mm/aaaa"  id="fecha_inicio_plan" required ><br/>
        </div>

        <div>
            <?= $strings['Fechaentregaplan']?> <br/>
            <input type="date" name="fecha_entrega_plan" value="<?= $datos->getFechaEntregaPlan()?>" placeholder="dd/mm/aaaa"  id="fecha_entrega_plan" required ><br/>
        </div>

        <div>
            <?= $strings['fecha_I_R']?><br/> <!-- AÑADIR A DICCIONARIOS A PARTIR DE AQUI -->
            <input type="date" name="fecha_inicio_real" value="<?= $datos->getFechaInicioReal()?>"  placeholder="dd/mm/aaaa"  id="fecha_inicio_real"><br/>
        </div>

        <div>
            <?=$strings['fecha_E_R']?><br/>
            <input type="date" name="fecha_entrega_real" value="<?= $datos->getFechaEntregaReal()?>" placeholder="dd/mm/aaaa"  id="fecha_entrega_real"><br/>
        </div>

        <div>
            <?=$strings['horas_P']?><br/>
            <input type="number" name="horas_plan" value="<?= $datos->getHorasPlan()?>" placeholder="ej: 8"  id="horas_plan" required ><br/>
        </div>

        <div>
            <?=$strings['horas_R']?><br/>
            <input type="number" name="horas_real" value="<?= $datos->getHorasReal()?>" placeholder="ej: 8"  id="horas_real"><br/>
        </div>

        <div>
            <?=$strings['asignado']?>

            <select name="miembro"> <!-- Muestra listado de miembros del proyecto, guarda el nombre usuario-->
                <?php foreach ($miembros as $miembro) {
                    if ($miembro->getUsuario() == $datos->getMiembro()->getUsuario()) {
                        ?>
                        <option value="<?=$miembro->getUsuario();?>" selected><?= $miembro->getUsuario() ?></option>
                    <?php } else {
                        ?>
                        <option value="<?=$miembro->getUsuario();?>"><?= $miembro->getUsuario() ?></option>
                    <?php
                    }

                } ?>
            </select>
        </div>

        <div>
            <?=$strings['estado']?>

            <select name="estado_tarea">
                <option <?php if($datos->getEstadoTarea()=="pendiente"){echo "selected";}?> value="pendiente"><?=$strings['pendiente']?></option>
                <option <?php if($datos->getEstadoTarea()=="finalizado"){echo"selected";}?> value="finalizado"><?=$strings['finalizado']?></option>
            </select>
        </div>

        <div>
            <?=$strings['comentarios']?><br/>
            <textarea type="textarea" name="comentario" value="<?= $datos->getComentario()?>" rows="4" cols="50"></textarea>
        </div>


        <input type="hidden"  name="accion" value="edit_subtarea">
        <input type='submit' onclick="DoSubmit()" value="<?=$strings['Modificar'] ?>"><br/><br/>
        </ul>
    </form>
    <a class="form-link" href='<?=$this->volver?>'><?=$strings['Volver']?> </a>
</div>
    <?php
    }
    }
    ?>
